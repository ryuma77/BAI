<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Resources\Admin\PromotionResource;
use App\Models\Promotion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromotionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromotionResource(Promotion::with(['employee_name', 'department_from', 'level_from', 'position_from', 'level_to', 'position_to'])->get());
    }

    public function store(StorePromotionRequest $request)
    {
        $promotion = Promotion::create($request->all());

        return (new PromotionResource($promotion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromotionResource($promotion->load(['employee_name', 'department_from', 'level_from', 'position_from', 'level_to', 'position_to']));
    }

    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        return (new PromotionResource($promotion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
