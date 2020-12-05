<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobdescRequest;
use App\Http\Requests\UpdateJobdescRequest;
use App\Http\Resources\Admin\JobdescResource;
use App\Models\Jobdesc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobdescApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jobdesc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobdescResource(Jobdesc::with(['department', 'position', 'level'])->get());
    }

    public function store(StoreJobdescRequest $request)
    {
        $jobdesc = Jobdesc::create($request->all());

        return (new JobdescResource($jobdesc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Jobdesc $jobdesc)
    {
        abort_if(Gate::denies('jobdesc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobdescResource($jobdesc->load(['department', 'position', 'level']));
    }

    public function update(UpdateJobdescRequest $request, Jobdesc $jobdesc)
    {
        $jobdesc->update($request->all());

        return (new JobdescResource($jobdesc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Jobdesc $jobdesc)
    {
        abort_if(Gate::denies('jobdesc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobdesc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
