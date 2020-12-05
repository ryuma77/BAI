<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRotationRequest;
use App\Http\Requests\UpdateRotationRequest;
use App\Http\Resources\Admin\RotationResource;
use App\Models\Rotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RotationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RotationResource(Rotation::with(['employee_name', 'department_from', 'department_to'])->get());
    }

    public function store(StoreRotationRequest $request)
    {
        $rotation = Rotation::create($request->all());

        return (new RotationResource($rotation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Rotation $rotation)
    {
        abort_if(Gate::denies('rotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RotationResource($rotation->load(['employee_name', 'department_from', 'department_to']));
    }

    public function update(UpdateRotationRequest $request, Rotation $rotation)
    {
        $rotation->update($request->all());

        return (new RotationResource($rotation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Rotation $rotation)
    {
        abort_if(Gate::denies('rotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rotation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
