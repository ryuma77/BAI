<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInputAbsenManualRequest;
use App\Http\Requests\StoreInputAbsenManualRequest;
use App\Http\Requests\UpdateInputAbsenManualRequest;
use App\Models\Employee;
use App\Models\InputAbsenManual;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InputAbsenManualController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('input_absen_manual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InputAbsenManual::with(['nik', 'team'])->select(sprintf('%s.*', (new InputAbsenManual)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'input_absen_manual_show';
                $editGate      = 'input_absen_manual_edit';
                $deleteGate    = 'input_absen_manual_delete';
                $crudRoutePart = 'input-absen-manuals';

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

            $table->editColumn('jam_masuk', function ($row) {
                return $row->jam_masuk ? $row->jam_masuk : "";
            });
            $table->editColumn('jam_keluar', function ($row) {
                return $row->jam_keluar ? $row->jam_keluar : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'nik']);

            return $table->make(true);
        }

        return view('admin.inputAbsenManuals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('input_absen_manual_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inputAbsenManuals.create', compact('niks'));
    }

    public function store(StoreInputAbsenManualRequest $request)
    {
        $inputAbsenManual = InputAbsenManual::create($request->all());

        return redirect()->route('admin.input-absen-manuals.index');
    }

    public function edit(InputAbsenManual $inputAbsenManual)
    {
        abort_if(Gate::denies('input_absen_manual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inputAbsenManual->load('nik', 'team');

        return view('admin.inputAbsenManuals.edit', compact('niks', 'inputAbsenManual'));
    }

    public function update(UpdateInputAbsenManualRequest $request, InputAbsenManual $inputAbsenManual)
    {
        $inputAbsenManual->update($request->all());

        return redirect()->route('admin.input-absen-manuals.index');
    }

    public function show(InputAbsenManual $inputAbsenManual)
    {
        abort_if(Gate::denies('input_absen_manual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAbsenManual->load('nik', 'team');

        return view('admin.inputAbsenManuals.show', compact('inputAbsenManual'));
    }

    public function destroy(InputAbsenManual $inputAbsenManual)
    {
        abort_if(Gate::denies('input_absen_manual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAbsenManual->delete();

        return back();
    }

    public function massDestroy(MassDestroyInputAbsenManualRequest $request)
    {
        InputAbsenManual::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
