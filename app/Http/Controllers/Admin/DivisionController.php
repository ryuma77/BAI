<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDivisionRequest;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Models\BusinessUnit;
use App\Models\Division;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('division_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisions = Division::with(['business_unit'])->get();

        $business_units = BusinessUnit::get();

        return view('admin.divisions.index', compact('divisions', 'business_units'));
    }

    public function create()
    {
        abort_if(Gate::denies('division_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business_units = BusinessUnit::all()->pluck('business_unit_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.divisions.create', compact('business_units'));
    }

    public function store(StoreDivisionRequest $request)
    {
        $division = Division::create($request->all());

        return redirect()->route('admin.divisions.index');
    }

    public function edit(Division $division)
    {
        abort_if(Gate::denies('division_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business_units = BusinessUnit::all()->pluck('business_unit_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $division->load('business_unit');

        return view('admin.divisions.edit', compact('business_units', 'division'));
    }

    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $division->update($request->all());

        return redirect()->route('admin.divisions.index');
    }

    public function show(Division $division)
    {
        abort_if(Gate::denies('division_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $division->load('business_unit', 'divisionNameDepartments', 'divisionEmployees');

        return view('admin.divisions.show', compact('division'));
    }

    public function destroy(Division $division)
    {
        abort_if(Gate::denies('division_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $division->delete();

        return back();
    }

    public function massDestroy(MassDestroyDivisionRequest $request)
    {
        Division::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
