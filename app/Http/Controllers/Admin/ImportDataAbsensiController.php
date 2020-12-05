<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImportDataAbsensiRequest;
use App\Http\Requests\StoreImportDataAbsensiRequest;
use App\Http\Requests\UpdateImportDataAbsensiRequest;
use App\Models\Employee;
use App\Models\ImportDataAbsensi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportDataAbsensiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('import_data_absensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importDataAbsensis = ImportDataAbsensi::with(['nik'])->get();

        return view('admin.importDataAbsensis.index', compact('importDataAbsensis'));
    }

    public function create()
    {
        abort_if(Gate::denies('import_data_absensi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.importDataAbsensis.create', compact('niks'));
    }

    public function store(StoreImportDataAbsensiRequest $request)
    {
        $importDataAbsensi = ImportDataAbsensi::create($request->all());

        return redirect()->route('admin.import-data-absensis.index');
    }

    public function edit(ImportDataAbsensi $importDataAbsensi)
    {
        abort_if(Gate::denies('import_data_absensi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $importDataAbsensi->load('nik');

        return view('admin.importDataAbsensis.edit', compact('niks', 'importDataAbsensi'));
    }

    public function update(UpdateImportDataAbsensiRequest $request, ImportDataAbsensi $importDataAbsensi)
    {
        $importDataAbsensi->update($request->all());

        return redirect()->route('admin.import-data-absensis.index');
    }

    public function show(ImportDataAbsensi $importDataAbsensi)
    {
        abort_if(Gate::denies('import_data_absensi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importDataAbsensi->load('nik');

        return view('admin.importDataAbsensis.show', compact('importDataAbsensi'));
    }

    public function destroy(ImportDataAbsensi $importDataAbsensi)
    {
        abort_if(Gate::denies('import_data_absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importDataAbsensi->delete();

        return back();
    }

    public function massDestroy(MassDestroyImportDataAbsensiRequest $request)
    {
        ImportDataAbsensi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
