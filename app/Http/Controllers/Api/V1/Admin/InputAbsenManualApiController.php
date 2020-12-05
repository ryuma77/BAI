<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInputAbsenManualRequest;
use App\Http\Requests\UpdateInputAbsenManualRequest;
use App\Http\Resources\Admin\InputAbsenManualResource;
use App\Models\InputAbsenManual;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InputAbsenManualApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('input_absen_manual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InputAbsenManualResource(InputAbsenManual::with(['nik', 'team'])->get());
    }

    public function store(StoreInputAbsenManualRequest $request)
    {
        $inputAbsenManual = InputAbsenManual::create($request->all());

        return (new InputAbsenManualResource($inputAbsenManual))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InputAbsenManual $inputAbsenManual)
    {
        abort_if(Gate::denies('input_absen_manual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InputAbsenManualResource($inputAbsenManual->load(['nik', 'team']));
    }

    public function update(UpdateInputAbsenManualRequest $request, InputAbsenManual $inputAbsenManual)
    {
        $inputAbsenManual->update($request->all());

        return (new InputAbsenManualResource($inputAbsenManual))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InputAbsenManual $inputAbsenManual)
    {
        abort_if(Gate::denies('input_absen_manual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAbsenManual->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
