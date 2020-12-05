<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::with(['division', 'department', 'position', 'media'])->get();

        $divisions = Division::get();

        $departments = Department::get();

        $positions = Position::get();

        return view('admin.employees.index', compact('employees', 'divisions', 'departments', 'positions'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employees.create', compact('divisions', 'departments', 'positions'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        if ($request->input('jpg', false)) {
            $employee->addMedia(storage_path('tmp/uploads/' . $request->input('jpg')))->toMediaCollection('jpg');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employee->id]);
        }

        return redirect()->route('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employee->load('division', 'department', 'position');

        return view('admin.employees.edit', compact('divisions', 'departments', 'positions', 'employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        if ($request->input('jpg', false)) {
            if (!$employee->jpg || $request->input('jpg') !== $employee->jpg->file_name) {
                if ($employee->jpg) {
                    $employee->jpg->delete();
                }

                $employee->addMedia(storage_path('tmp/uploads/' . $request->input('jpg')))->toMediaCollection('jpg');
            }
        } elseif ($employee->jpg) {
            $employee->jpg->delete();
        }

        return redirect()->route('admin.employees.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('division', 'department', 'position', 'employeeSalaries', 'employeeNameEmployeeFamilies', 'employeeNameRotations', 'employeeNamePromotions');

        return view('admin.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employee_create') && Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Employee();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
