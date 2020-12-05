<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPengajuancutiRequest;
use App\Http\Requests\StorePengajuancutiRequest;
use App\Http\Requests\UpdatePengajuancutiRequest;
use App\Models\Employee;
use App\Models\JenisCuti;
use App\Models\Pengajuancuti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengajuancutiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pengajuancuti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuancutis = Pengajuancuti::with(['nik', 'nama', 'jenis_cuti'])->get();

        return view('admin.pengajuancutis.index', compact('pengajuancutis'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengajuancuti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jenis_cutis = JenisCuti::all()->pluck('jenis_cuti', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pengajuancutis.create', compact('niks', 'namas', 'jenis_cutis'));
    }

    public function store(StorePengajuancutiRequest $request)
    {
        $pengajuancuti = Pengajuancuti::create($request->all());

        return redirect()->route('admin.pengajuancutis.index');
    }

    public function edit(Pengajuancuti $pengajuancuti)
    {
        abort_if(Gate::denies('pengajuancuti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $namas = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jenis_cutis = JenisCuti::all()->pluck('jenis_cuti', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pengajuancuti->load('nik', 'nama', 'jenis_cuti');

        return view('admin.pengajuancutis.edit', compact('niks', 'namas', 'jenis_cutis', 'pengajuancuti'));
    }

    public function update(UpdatePengajuancutiRequest $request, Pengajuancuti $pengajuancuti)
    {
        $pengajuancuti->update($request->all());

        return redirect()->route('admin.pengajuancutis.index');
    }

    public function show(Pengajuancuti $pengajuancuti)
    {
        abort_if(Gate::denies('pengajuancuti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuancuti->load('nik', 'nama', 'jenis_cuti');

        return view('admin.pengajuancutis.show', compact('pengajuancuti'));
    }

    public function destroy(Pengajuancuti $pengajuancuti)
    {
        abort_if(Gate::denies('pengajuancuti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuancuti->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengajuancutiRequest $request)
    {
        Pengajuancuti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
