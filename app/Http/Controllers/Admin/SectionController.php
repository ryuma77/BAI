<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySectionRequest;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Department;
use App\Models\Section;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::with(['department_name'])->get();

        $departments = Department::get();

        return view('admin.sections.index', compact('sections', 'departments'));
    }

    public function create()
    {
        abort_if(Gate::denies('section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_names = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sections.create', compact('department_names'));
    }

    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->all());

        return redirect()->route('admin.sections.index');
    }

    public function edit(Section $section)
    {
        abort_if(Gate::denies('section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_names = Department::all()->pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $section->load('department_name');

        return view('admin.sections.edit', compact('department_names', 'section'));
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->all());

        return redirect()->route('admin.sections.index');
    }

    public function show(Section $section)
    {
        abort_if(Gate::denies('section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $section->load('department_name');

        return view('admin.sections.show', compact('section'));
    }

    public function destroy(Section $section)
    {
        abort_if(Gate::denies('section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $section->delete();

        return back();
    }

    public function massDestroy(MassDestroySectionRequest $request)
    {
        Section::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
