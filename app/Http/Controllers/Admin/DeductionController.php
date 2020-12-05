<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeductionRequest;
use App\Http\Requests\StoreDeductionRequest;
use App\Http\Requests\UpdateDeductionRequest;
use App\Models\Deduction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeductionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deductions = Deduction::all();

        return view('admin.deductions.index', compact('deductions'));
    }

    public function create()
    {
        abort_if(Gate::denies('deduction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deductions.create');
    }

    public function store(StoreDeductionRequest $request)
    {
        $deduction = Deduction::create($request->all());

        return redirect()->route('admin.deductions.index');
    }

    public function edit(Deduction $deduction)
    {
        abort_if(Gate::denies('deduction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deductions.edit', compact('deduction'));
    }

    public function update(UpdateDeductionRequest $request, Deduction $deduction)
    {
        $deduction->update($request->all());

        return redirect()->route('admin.deductions.index');
    }

    public function show(Deduction $deduction)
    {
        abort_if(Gate::denies('deduction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deductions.show', compact('deduction'));
    }

    public function destroy(Deduction $deduction)
    {
        abort_if(Gate::denies('deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deduction->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeductionRequest $request)
    {
        Deduction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
