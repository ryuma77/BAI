<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBpjRequest;
use App\Http\Requests\StoreBpjRequest;
use App\Http\Requests\UpdateBpjRequest;
use App\Models\Bpj;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BpjsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bpj_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bpjs = Bpj::all();

        return view('admin.bpjs.index', compact('bpjs'));
    }

    public function create()
    {
        abort_if(Gate::denies('bpj_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bpjs.create');
    }

    public function store(StoreBpjRequest $request)
    {
        $bpj = Bpj::create($request->all());

        return redirect()->route('admin.bpjs.index');
    }

    public function edit(Bpj $bpj)
    {
        abort_if(Gate::denies('bpj_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bpjs.edit', compact('bpj'));
    }

    public function update(UpdateBpjRequest $request, Bpj $bpj)
    {
        $bpj->update($request->all());

        return redirect()->route('admin.bpjs.index');
    }

    public function show(Bpj $bpj)
    {
        abort_if(Gate::denies('bpj_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bpjs.show', compact('bpj'));
    }

    public function destroy(Bpj $bpj)
    {
        abort_if(Gate::denies('bpj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bpj->delete();

        return back();
    }

    public function massDestroy(MassDestroyBpjRequest $request)
    {
        Bpj::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
