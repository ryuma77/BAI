<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRotationRequest;
use App\Http\Requests\StoreRotationRequest;
use App\Http\Requests\UpdateRotationRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Rotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RotationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rotations = Rotation::with(['employee_name', 'department_from', 'department_to'])->get();

        return view('admin.rotations.index', compact('rotations'));
    }

    public function create()
    {
        abort_if(Gate::denies('rotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_froms = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_tos = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rotations.create', compact('employee_names', 'department_froms', 'department_tos'));
    }

    public function store(StoreRotationRequest $request)
    {
        $rotation = Rotation::create($request->all());

        return redirect()->route('admin.rotations.index');
    }

    public function edit(Rotation $rotation)
    {
        abort_if(Gate::denies('rotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_froms = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_tos = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rotation->load('employee_name', 'department_from', 'department_to');

        return view('admin.rotations.edit', compact('employee_names', 'department_froms', 'department_tos', 'rotation'));
    }

    public function update(UpdateRotationRequest $request, Rotation $rotation)
    {
        $rotation->update($request->all());

        return redirect()->route('admin.rotations.index');
    }

    public function show(Rotation $rotation)
    {
        abort_if(Gate::denies('rotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rotation->load('employee_name', 'department_from', 'department_to');

        return view('admin.rotations.show', compact('rotation'));
    }

    public function destroy(Rotation $rotation)
    {
        abort_if(Gate::denies('rotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyRotationRequest $request)
    {
        Rotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
