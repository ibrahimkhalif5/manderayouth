<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Http\Resources\Admin\CareerResource;
use App\Models\Career;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CareerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('career_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CareerResource(Career::all());
    }

    public function store(StoreCareerRequest $request)
    {
        $career = Career::create($request->all());

        if ($request->input('image', false)) {
            $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new CareerResource($career))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Career $career)
    {
        abort_if(Gate::denies('career_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CareerResource($career);
    }

    public function update(UpdateCareerRequest $request, Career $career)
    {
        $career->update($request->all());

        if ($request->input('image', false)) {
            if (! $career->image || $request->input('image') !== $career->image->file_name) {
                if ($career->image) {
                    $career->image->delete();
                }
                $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($career->image) {
            $career->image->delete();
        }

        return (new CareerResource($career))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Career $career)
    {
        abort_if(Gate::denies('career_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $career->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
