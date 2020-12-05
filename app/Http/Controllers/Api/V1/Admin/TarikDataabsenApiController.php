<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarikDataabsenRequest;
use App\Http\Requests\UpdateTarikDataabsenRequest;
use App\Http\Resources\Admin\TarikDataabsenResource;
use App\Models\TarikDataabsen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TarikDataabsenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tarik_dataabsen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TarikDataabsenResource(TarikDataabsen::with(['nik', 'team'])->get());
    }

    public function store(StoreTarikDataabsenRequest $request)
    {
        $tarikDataabsen = TarikDataabsen::create($request->all());

        return (new TarikDataabsenResource($tarikDataabsen))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TarikDataabsen $tarikDataabsen)
    {
        abort_if(Gate::denies('tarik_dataabsen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TarikDataabsenResource($tarikDataabsen->load(['nik', 'team']));
    }

    public function update(UpdateTarikDataabsenRequest $request, TarikDataabsen $tarikDataabsen)
    {
        $tarikDataabsen->update($request->all());

        return (new TarikDataabsenResource($tarikDataabsen))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TarikDataabsen $tarikDataabsen)
    {
        abort_if(Gate::denies('tarik_dataabsen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tarikDataabsen->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
