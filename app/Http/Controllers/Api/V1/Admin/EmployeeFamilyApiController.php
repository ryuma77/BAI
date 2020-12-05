<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEmployeeFamilyRequest;
use App\Http\Requests\UpdateEmployeeFamilyRequest;
use App\Http\Resources\Admin\EmployeeFamilyResource;
use App\Models\EmployeeFamily;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeFamilyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employee_family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeFamilyResource(EmployeeFamily::with(['employee_name', 'nik', 'team'])->get());
    }

    public function store(StoreEmployeeFamilyRequest $request)
    {
        $employeeFamily = EmployeeFamily::create($request->all());

        return (new EmployeeFamilyResource($employeeFamily))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EmployeeFamily $employeeFamily)
    {
        abort_if(Gate::denies('employee_family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeFamilyResource($employeeFamily->load(['employee_name', 'nik', 'team']));
    }

    public function update(UpdateEmployeeFamilyRequest $request, EmployeeFamily $employeeFamily)
    {
        $employeeFamily->update($request->all());

        return (new EmployeeFamilyResource($employeeFamily))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EmployeeFamily $employeeFamily)
    {
        abort_if(Gate::denies('employee_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employeeFamily->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
