<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJenisCutiRequest;
use App\Http\Requests\StoreJenisCutiRequest;
use App\Http\Requests\UpdateJenisCutiRequest;
use App\Models\JenisCuti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JenisCutiController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('jenis_cuti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JenisCuti::query()->select(sprintf('%s.*', (new JenisCuti)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'jenis_cuti_show';
                $editGate      = 'jenis_cuti_edit';
                $deleteGate    = 'jenis_cuti_delete';
                $crudRoutePart = 'jenis-cutis';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('kode_cuti', function ($row) {
                return $row->kode_cuti ? $row->kode_cuti : "";
            });
            $table->editColumn('jenis_cuti', function ($row) {
                return $row->jenis_cuti ? $row->jenis_cuti : "";
            });
            $table->editColumn('maks_pertahun', function ($row) {
                return $row->maks_pertahun ? $row->maks_pertahun : "";
            });
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.jenisCutis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jenis_cuti_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenisCutis.create');
    }

    public function store(StoreJenisCutiRequest $request)
    {
        $jenisCuti = JenisCuti::create($request->all());

        return redirect()->route('admin.jenis-cutis.index');
    }

    public function edit(JenisCuti $jenisCuti)
    {
        abort_if(Gate::denies('jenis_cuti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenisCutis.edit', compact('jenisCuti'));
    }

    public function update(UpdateJenisCutiRequest $request, JenisCuti $jenisCuti)
    {
        $jenisCuti->update($request->all());

        return redirect()->route('admin.jenis-cutis.index');
    }

    public function show(JenisCuti $jenisCuti)
    {
        abort_if(Gate::denies('jenis_cuti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenisCutis.show', compact('jenisCuti'));
    }

    public function destroy(JenisCuti $jenisCuti)
    {
        abort_if(Gate::denies('jenis_cuti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisCuti->delete();

        return back();
    }

    public function massDestroy(MassDestroyJenisCutiRequest $request)
    {
        JenisCuti::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
