<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLemburRequest;
use App\Http\Requests\UpdateLemburRequest;
use App\Http\Resources\Admin\LemburResource;
use App\Models\Lembur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LemburApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lembur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LemburResource(Lembur::with(['nik', 'team'])->get());
    }

    public function store(StoreLemburRequest $request)
    {
        $lembur = Lembur::create($request->all());

        return (new LemburResource($lembur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LemburResource($lembur->load(['nik', 'team']));
    }

    public function update(UpdateLemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->all());

        return (new LemburResource($lembur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lembur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
