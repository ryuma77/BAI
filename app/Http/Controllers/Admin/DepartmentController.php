<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Division;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with(['division_name'])->get();

        $divisions = Division::get();

        return view('admin.departments.index', compact('departments', 'divisions'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $division_names = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.departments.create', compact('division_names'));
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->all());

        return redirect()->route('admin.departments.index');
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $division_names = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department->load('division_name');

        return view('admin.departments.edit', compact('division_names', 'department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->all());

        return redirect()->route('admin.departments.index');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->load('division_name', 'departmentNameSections', 'departmentEmployees', 'departmentFromPromotions');

        return view('admin.departments.show', compact('department'));
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
