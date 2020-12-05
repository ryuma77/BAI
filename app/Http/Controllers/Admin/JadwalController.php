<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJadwalRequest;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Department;
use App\Models\Jadwal;
use App\Models\Section;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JadwalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jadwal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwals = Jadwal::with(['departement', 'bagian'])->get();

        return view('admin.jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        abort_if(Gate::denies('jadwal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departements = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bagians = Section::all()->pluck('section_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jadwals.create', compact('departements', 'bagians'));
    }

    public function store(StoreJadwalRequest $request)
    {
        $jadwal = Jadwal::create($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function edit(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departements = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bagians = Section::all()->pluck('section_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jadwal->load('departement', 'bagian');

        return view('admin.jadwals.edit', compact('departements', 'bagians', 'jadwal'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function show(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->load('departement', 'bagian');

        return view('admin.jadwals.show', compact('jadwal'));
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->delete();

        return back();
    }

    public function massDestroy(MassDestroyJadwalRequest $request)
    {
        Jadwal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
