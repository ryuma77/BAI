<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBpjRequest;
use App\Http\Requests\UpdateBpjRequest;
use App\Http\Resources\Admin\BpjResource;
use App\Models\Bpj;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BpjsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bpj_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BpjResource(Bpj::all());
    }

    public function store(StoreBpjRequest $request)
    {
        $bpj = Bpj::create($request->all());

        return (new BpjResource($bpj))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bpj $bpj)
    {
        abort_if(Gate::denies('bpj_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BpjResource($bpj);
    }

    public function update(UpdateBpjRequest $request, Bpj $bpj)
    {
        $bpj->update($request->all());

        return (new BpjResource($bpj))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bpj $bpj)
    {
        abort_if(Gate::denies('bpj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bpj->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
