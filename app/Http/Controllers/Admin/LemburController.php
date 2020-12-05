<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLemburRequest;
use App\Http\Requests\StoreLemburRequest;
use App\Http\Requests\UpdateLemburRequest;
use App\Models\Employee;
use App\Models\Lembur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LemburController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('lembur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lembur::with(['nik', 'team'])->select(sprintf('%s.*', (new Lembur)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lembur_show';
                $editGate      = 'lembur_edit';
                $deleteGate    = 'lembur_delete';
                $crudRoutePart = 'lemburs';

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
            $table->editColumn('ip_address', function ($row) {
                return $row->ip_address ? $row->ip_address : "";
            });
            $table->addColumn('nik_nik', function ($row) {
                return $row->nik ? $row->nik->nik : '';
            });

            $table->editColumn('jam_lembur', function ($row) {
                return $row->jam_lembur ? $row->jam_lembur : "";
            });
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'nik']);

            return $table->make(true);
        }

        return view('admin.lemburs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lembur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lemburs.create', compact('niks'));
    }

    public function store(StoreLemburRequest $request)
    {
        $lembur = Lembur::create($request->all());

        return redirect()->route('admin.lemburs.index');
    }

    public function edit(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lembur->load('nik', 'team');

        return view('admin.lemburs.edit', compact('niks', 'lembur'));
    }

    public function update(UpdateLemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->all());

        return redirect()->route('admin.lemburs.index');
    }

    public function show(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lembur->load('nik', 'team');

        return view('admin.lemburs.show', compact('lembur'));
    }

    public function destroy(Lembur $lembur)
    {
        abort_if(Gate::denies('lembur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lembur->delete();

        return back();
    }

    public function massDestroy(MassDestroyLemburRequest $request)
    {
        Lembur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
