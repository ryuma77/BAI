<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\Admin\EmployeeResource;
use App\Models\Employee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeResource(Employee::with(['division', 'department', 'position'])->get());
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        if ($request->input('jpg', false)) {
            $employee->addMedia(storage_path('tmp/uploads/' . $request->input('jpg')))->toMediaCollection('jpg');
        }

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeeResource($employee->load(['division', 'department', 'position']));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        if ($request->input('jpg', false)) {
            if (!$employee->jpg || $request->input('jpg') !== $employee->jpg->file_name) {
                if ($employee->jpg) {
                    $employee->jpg->delete();
                }

                $employee->addMedia(storage_path('tmp/uploads/' . $request->input('jpg')))->toMediaCollection('jpg');
            }
        } elseif ($employee->jpg) {
            $employee->jpg->delete();
        }

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
