<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTarikDataabsenRequest;
use App\Http\Requests\StoreTarikDataabsenRequest;
use App\Http\Requests\UpdateTarikDataabsenRequest;
use App\Models\Employee;
use App\Models\TarikDataabsen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TarikDataabsenController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tarik_dataabsen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TarikDataabsen::with(['nik', 'team'])->select(sprintf('%s.*', (new TarikDataabsen)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tarik_dataabsen_show';
                $editGate      = 'tarik_dataabsen_edit';
                $deleteGate    = 'tarik_dataabsen_delete';
                $crudRoutePart = 'tarik-dataabsens';

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

        return view('admin.tarikDataabsens.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tarik_dataabsen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tarikDataabsens.create', compact('niks'));
    }

    public function store(StoreTarikDataabsenRequest $request)
    {
        $tarikDataabsen = TarikDataabsen::create($request->all());

        return redirect()->route('admin.tarik-dataabsens.index');
    }

    public function edit(TarikDataabsen $tarikDataabsen)
    {
        abort_if(Gate::denies('tarik_dataabsen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niks = Employee::all()->pluck('nik', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tarikDataabsen->load('nik', 'team');

        return view('admin.tarikDataabsens.edit', compact('niks', 'tarikDataabsen'));
    }

    public function update(UpdateTarikDataabsenRequest $request, TarikDataabsen $tarikDataabsen)
    {
        $tarikDataabsen->update($request->all());

        return redirect()->route('admin.tarik-dataabsens.index');
    }

    public function show(TarikDataabsen $tarikDataabsen)
    {
        abort_if(Gate::denies('tarik_dataabsen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tarikDataabsen->load('nik', 'team');

        return view('admin.tarikDataabsens.show', compact('tarikDataabsen'));
    }

    public function destroy(TarikDataabsen $tarikDataabsen)
    {
        abort_if(Gate::denies('tarik_dataabsen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tarikDataabsen->delete();

        return back();
    }

    public function massDestroy(MassDestroyTarikDataabsenRequest $request)
    {
        TarikDataabsen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
