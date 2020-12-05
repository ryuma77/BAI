<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengajuancutiRequest;
use App\Http\Requests\UpdatePengajuancutiRequest;
use App\Http\Resources\Admin\PengajuancutiResource;
use App\Models\Pengajuancuti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengajuancutiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pengajuancuti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengajuancutiResource(Pengajuancuti::with(['nik', 'nama', 'jenis_cuti'])->get());
    }

    public function store(StorePengajuancutiRequest $request)
    {
        $pengajuancuti = Pengajuancuti::create($request->all());

        return (new PengajuancutiResource($pengajuancuti))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pengajuancuti $pengajuancuti)
    {
        abort_if(Gate::denies('pengajuancuti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengajuancutiResource($pengajuancuti->load(['nik', 'nama', 'jenis_cuti']));
    }

    public function update(UpdatePengajuancutiRequest $request, Pengajuancuti $pengajuancuti)
    {
        $pengajuancuti->update($request->all());

        return (new PengajuancutiResource($pengajuancuti))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pengajuancuti $pengajuancuti)
    {
        abort_if(Gate::denies('pengajuancuti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengajuancuti->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
