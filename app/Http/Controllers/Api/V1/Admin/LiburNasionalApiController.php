<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiburNasionalRequest;
use App\Http\Requests\UpdateLiburNasionalRequest;
use App\Http\Resources\Admin\LiburNasionalResource;
use App\Models\LiburNasional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiburNasionalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('libur_nasional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LiburNasionalResource(LiburNasional::all());
    }

    public function store(StoreLiburNasionalRequest $request)
    {
        $liburNasional = LiburNasional::create($request->all());

        return (new LiburNasionalResource($liburNasional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LiburNasional $liburNasional)
    {
        abort_if(Gate::denies('libur_nasional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LiburNasionalResource($liburNasional);
    }

    public function update(UpdateLiburNasionalRequest $request, LiburNasional $liburNasional)
    {
        $liburNasional->update($request->all());

        return (new LiburNasionalResource($liburNasional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LiburNasional $liburNasional)
    {
        abort_if(Gate::denies('libur_nasional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liburNasional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
