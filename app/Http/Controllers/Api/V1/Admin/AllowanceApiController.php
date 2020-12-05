<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllowanceRequest;
use App\Http\Requests\UpdateAllowanceRequest;
use App\Http\Resources\Admin\AllowanceResource;
use App\Models\Allowance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllowanceResource(Allowance::all());
    }

    public function store(StoreAllowanceRequest $request)
    {
        $allowance = Allowance::create($request->all());

        return (new AllowanceResource($allowance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Allowance $allowance)
    {
        abort_if(Gate::denies('allowance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllowanceResource($allowance);
    }

    public function update(UpdateAllowanceRequest $request, Allowance $allowance)
    {
        $allowance->update($request->all());

        return (new AllowanceResource($allowance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Allowance $allowance)
    {
        abort_if(Gate::denies('allowance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allowance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
