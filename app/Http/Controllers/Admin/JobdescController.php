<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobdescRequest;
use App\Http\Requests\StoreJobdescRequest;
use App\Http\Requests\UpdateJobdescRequest;
use App\Models\Department;
use App\Models\Jobdesc;
use App\Models\Level;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobdescController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jobdesc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobdescs = Jobdesc::with(['department', 'position', 'level'])->get();

        return view('admin.jobdescs.index', compact('jobdescs'));
    }

    public function create()
    {
        abort_if(Gate::denies('jobdesc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jobdescs.create', compact('departments', 'positions', 'levels'));
    }

    public function store(StoreJobdescRequest $request)
    {
        $jobdesc = Jobdesc::create($request->all());

        return redirect()->route('admin.jobdescs.index');
    }

    public function edit(Jobdesc $jobdesc)
    {
        abort_if(Gate::denies('jobdesc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jobdesc->load('department', 'position', 'level');

        return view('admin.jobdescs.edit', compact('departments', 'positions', 'levels', 'jobdesc'));
    }

    public function update(UpdateJobdescRequest $request, Jobdesc $jobdesc)
    {
        $jobdesc->update($request->all());

        return redirect()->route('admin.jobdescs.index');
    }

    public function show(Jobdesc $jobdesc)
    {
        abort_if(Gate::denies('jobdesc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobdesc->load('department', 'position', 'level');

        return view('admin.jobdescs.show', compact('jobdesc'));
    }

    public function destroy(Jobdesc $jobdesc)
    {
        abort_if(Gate::denies('jobdesc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobdesc->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobdescRequest $request)
    {
        Jobdesc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
