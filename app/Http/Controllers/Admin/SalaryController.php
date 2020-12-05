<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalaryRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Models\Allowance;
use App\Models\Bpj;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Salary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaries = Salary::with(['employee', 'bpjs', 'tunjangans', 'potongans'])->get();

        return view('admin.salaries.index', compact('salaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bpjs = Bpj::all()->pluck('jenis_program', 'id');

        $tunjangans = Allowance::all()->pluck('kode_allowance', 'id');

        $potongans = Deduction::all()->pluck('kode_allowance', 'id');

        return view('admin.salaries.create', compact('employees', 'bpjs', 'tunjangans', 'potongans'));
    }

    public function store(StoreSalaryRequest $request)
    {
        $salary = Salary::create($request->all());
        $salary->bpjs()->sync($request->input('bpjs', []));
        $salary->tunjangans()->sync($request->input('tunjangans', []));
        $salary->potongans()->sync($request->input('potongans', []));

        return redirect()->route('admin.salaries.index');
    }

    public function edit(Salary $salary)
    {
        abort_if(Gate::denies('salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bpjs = Bpj::all()->pluck('jenis_program', 'id');

        $tunjangans = Allowance::all()->pluck('kode_allowance', 'id');

        $potongans = Deduction::all()->pluck('kode_allowance', 'id');

        $salary->load('employee', 'bpjs', 'tunjangans', 'potongans');

        return view('admin.salaries.edit', compact('employees', 'bpjs', 'tunjangans', 'potongans', 'salary'));
    }

    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $salary->update($request->all());
        $salary->bpjs()->sync($request->input('bpjs', []));
        $salary->tunjangans()->sync($request->input('tunjangans', []));
        $salary->potongans()->sync($request->input('potongans', []));

        return redirect()->route('admin.salaries.index');
    }

    public function show(Salary $salary)
    {
        abort_if(Gate::denies('salary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->load('employee', 'bpjs', 'tunjangans', 'potongans');

        return view('admin.salaries.show', compact('salary'));
    }

    public function destroy(Salary $salary)
    {
        abort_if(Gate::denies('salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryRequest $request)
    {
        Salary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
