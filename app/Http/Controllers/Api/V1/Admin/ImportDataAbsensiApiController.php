<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImportDataAbsensiRequest;
use App\Http\Requests\UpdateImportDataAbsensiRequest;
use App\Http\Resources\Admin\ImportDataAbsensiResource;
use App\Models\ImportDataAbsensi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportDataAbsensiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('import_data_absensi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImportDataAbsensiResource(ImportDataAbsensi::with(['nik'])->get());
    }

    public function store(StoreImportDataAbsensiRequest $request)
    {
        $importDataAbsensi = ImportDataAbsensi::create($request->all());

        return (new ImportDataAbsensiResource($importDataAbsensi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ImportDataAbsensi $importDataAbsensi)
    {
        abort_if(Gate::denies('import_data_absensi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImportDataAbsensiResource($importDataAbsensi->load(['nik']));
    }

    public function update(UpdateImportDataAbsensiRequest $request, ImportDataAbsensi $importDataAbsensi)
    {
        $importDataAbsensi->update($request->all());

        return (new ImportDataAbsensiResource($importDataAbsensi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ImportDataAbsensi $importDataAbsensi)
    {
        abort_if(Gate::denies('import_data_absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importDataAbsensi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
