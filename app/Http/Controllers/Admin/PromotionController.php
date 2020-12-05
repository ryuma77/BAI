<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPromotionRequest;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Level;
use App\Models\Position;
use App\Models\Promotion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromotionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotions = Promotion::with(['employee_name', 'department_from', 'level_from', 'position_from', 'level_to', 'position_to'])->get();

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        abort_if(Gate::denies('promotion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_froms = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_froms = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $position_froms = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_tos = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $position_tos = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.promotions.create', compact('employee_names', 'department_froms', 'level_froms', 'position_froms', 'level_tos', 'position_tos'));
    }

    public function store(StorePromotionRequest $request)
    {
        $promotion = Promotion::create($request->all());

        return redirect()->route('admin.promotions.index');
    }

    public function edit(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department_froms = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_froms = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $position_froms = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_tos = Level::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $position_tos = Position::all()->pluck('position_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $promotion->load('employee_name', 'department_from', 'level_from', 'position_from', 'level_to', 'position_to');

        return view('admin.promotions.edit', compact('employee_names', 'department_froms', 'level_froms', 'position_froms', 'level_tos', 'position_tos', 'promotion'));
    }

    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        return redirect()->route('admin.promotions.index');
    }

    public function show(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotion->load('employee_name', 'department_from', 'level_from', 'position_from', 'level_to', 'position_to');

        return view('admin.promotions.show', compact('promotion'));
    }

    public function destroy(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotion->delete();

        return back();
    }

    public function massDestroy(MassDestroyPromotionRequest $request)
    {
        Promotion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
