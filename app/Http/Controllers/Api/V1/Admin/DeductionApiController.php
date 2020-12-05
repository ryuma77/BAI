<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionRequest;
use App\Http\Requests\UpdateDeductionRequest;
use App\Http\Resources\Admin\DeductionResource;
use App\Models\Deduction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeductionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deduction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeductionResource(Deduction::all());
    }

    public function store(StoreDeductionRequest $request)
    {
        $deduction = Deduction::create($request->all());

        return (new DeductionResource($deduction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Deduction $deduction)
    {
        abort_if(Gate::denies('deduction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeductionResource($deduction);
    }

    public function update(UpdateDeductionRequest $request, Deduction $deduction)
    {
        $deduction->update($request->all());

        return (new DeductionResource($deduction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Deduction $deduction)
    {
        abort_if(Gate::denies('deduction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deduction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
