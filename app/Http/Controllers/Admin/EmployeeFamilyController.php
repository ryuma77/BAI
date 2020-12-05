<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeeFamilyRequest;
use App\Http\Requests\StoreEmployeeFamilyRequest;
use App\Http\Requests\UpdateEmployeeFamilyRequest;
use App\Models\Employee;
use App\Models\EmployeeFamily;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployeeFamilyController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employee_family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EmployeeFamily::with(['employee_name', 'nik', 'team'])->select(sprintf('%s.*', (new EmployeeFamily)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'employee_family_show';
                $editGate      = 'employee_family_edit';
                $deleteGate    = 'employee_family_delete';
                $crudRoutePart = 'employee-families';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('employee_name_nama', function ($row) {
                return $row->employee_name ? $row->employee_name->nama : '';
            });

            $table->editColumn('employee_name.nama', function ($row) {
                return $row->employee_name ? (is_string($row->employee_name) ? $row->employee_name : $row->employee_name->nama) : '';
            });
            $table->editColumn('family_name', function ($row) {
                return $row->family_name ? $row->family_name : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? EmployeeFamily::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('nik_nik', function ($row) {
                return $row->nik ? $row->nik->nik : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'employee_name', 'nik']);

            return $table->make(true);
        }

        return view('admin.employeeFamilies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('employee_family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employeeFamilies.create', compact('employee_names', 'niks'));
    }

    public function store(StoreEmployeeFamilyRequest $request)
    {
        $employeeFamily = EmployeeFamily::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employeeFamily->id]);
        }

        return redirect()->route('admin.employee-families.index');
    }

    public function edit(EmployeeFamily $employeeFamily)
    {
        abort_if(Gate::denies('employee_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employeeFamily->load('employee_name', 'nik', 'team');

        return view('admin.employeeFamilies.edit', compact('employee_names', 'niks', 'employeeFamily'));
    }

    public function update(UpdateEmployeeFamilyRequest $request, EmployeeFamily $employeeFamily)
    {
        $employeeFamily->update($request->all());

        return redirect()->route('admin.employee-families.index');
    }

    public function show(EmployeeFamily $employeeFamily)
    {
        abort_if(Gate::denies('employee_family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeFamily->load('employee_name', 'nik', 'team');

        return view('admin.employeeFamilies.show', compact('employeeFamily'));
    }

    public function destroy(EmployeeFamily $employeeFamily)
    {
        abort_if(Gate::denies('employee_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeFamily->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeFamilyRequest $request)
    {
        EmployeeFamily::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employee_family_create') && Gate::denies('employee_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EmployeeFamily();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
