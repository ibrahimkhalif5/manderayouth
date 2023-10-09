<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\Admin\ApplicationResource;
use App\Models\Application;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource(Application::with(['user', 'skills_training'])->get());
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        if ($request->input('image', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('id_copy', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('id_copy'))))->toMediaCollection('id_copy');
        }

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource($application->load(['user', 'skills_training']));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        if ($request->input('image', false)) {
            if (! $application->image || $request->input('image') !== $application->image->file_name) {
                if ($application->image) {
                    $application->image->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($application->image) {
            $application->image->delete();
        }

        if ($request->input('id_copy', false)) {
            if (! $application->id_copy || $request->input('id_copy') !== $application->id_copy->file_name) {
                if ($application->id_copy) {
                    $application->id_copy->delete();
                }
                $application->addMedia(storage_path('tmp/uploads/' . basename($request->input('id_copy'))))->toMediaCollection('id_copy');
            }
        } elseif ($application->id_copy) {
            $application->id_copy->delete();
        }

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
