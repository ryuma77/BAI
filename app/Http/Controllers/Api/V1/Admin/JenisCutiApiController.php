<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJenisCutiRequest;
use App\Http\Requests\UpdateJenisCutiRequest;
use App\Http\Resources\Admin\JenisCutiResource;
use App\Models\JenisCuti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JenisCutiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jenis_cuti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JenisCutiResource(JenisCuti::all());
    }

    public function store(StoreJenisCutiRequest $request)
    {
        $jenisCuti = JenisCuti::create($request->all());

        return (new JenisCutiResource($jenisCuti))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JenisCuti $jenisCuti)
    {
        abort_if(Gate::denies('jenis_cuti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JenisCutiResource($jenisCuti);
    }

    public function update(UpdateJenisCutiRequest $request, JenisCuti $jenisCuti)
    {
        $jenisCuti->update($request->all());

        return (new JenisCutiResource($jenisCuti))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JenisCuti $jenisCuti)
    {
        abort_if(Gate::denies('jenis_cuti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisCuti->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
