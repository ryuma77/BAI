<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLiburNasionalRequest;
use App\Http\Requests\StoreLiburNasionalRequest;
use App\Http\Requests\UpdateLiburNasionalRequest;
use App\Models\LiburNasional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiburNasionalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('libur_nasional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liburNasionals = LiburNasional::all();

        return view('admin.liburNasionals.index', compact('liburNasionals'));
    }

    public function create()
    {
        abort_if(Gate::denies('libur_nasional_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liburNasionals.create');
    }

    public function store(StoreLiburNasionalRequest $request)
    {
        $liburNasional = LiburNasional::create($request->all());

        return redirect()->route('admin.libur-nasionals.index');
    }

    public function edit(LiburNasional $liburNasional)
    {
        abort_if(Gate::denies('libur_nasional_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liburNasionals.edit', compact('liburNasional'));
    }

    public function update(UpdateLiburNasionalRequest $request, LiburNasional $liburNasional)
    {
        $liburNasional->update($request->all());

        return redirect()->route('admin.libur-nasionals.index');
    }

    public function show(LiburNasional $liburNasional)
    {
        abort_if(Gate::denies('libur_nasional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liburNasionals.show', compact('liburNasional'));
    }

    public function destroy(LiburNasional $liburNasional)
    {
        abort_if(Gate::denies('libur_nasional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liburNasional->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiburNasionalRequest $request)
    {
        LiburNasional::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
