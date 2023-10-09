<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCareerRequest;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('career_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Career::query()->select(sprintf('%s.*', (new Career)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'career_show';
                $editGate      = 'career_edit';
                $deleteGate    = 'career_delete';
                $crudRoutePart = 'careers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('opportunity_type', function ($row) {
                return $row->opportunity_type ? Career::OPPORTUNITY_TYPE_SELECT[$row->opportunity_type] : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('training_mode', function ($row) {
                return $row->training_mode ? Career::TRAINING_MODE_SELECT[$row->training_mode] : '';
            });
            $table->editColumn('venue', function ($row) {
                return $row->venue ? $row->venue : '';
            });

            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.careers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('career_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $career = Career::create($request->all());

        if ($request->input('image', false)) {
            $career->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $career->id]);
        }

        return redirect()->route('admin.careers.index');
    }

    public function edit(Career $career)
    {
        abort_if(Gate::denies('career_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.edit', compact('career'));
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

        return redirect()->route('admin.careers.index');
    }

    public function show(Career $career)
    {
        abort_if(Gate::denies('career_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.careers.show', compact('career'));
    }

    public function destroy(Career $career)
    {
        abort_if(Gate::denies('career_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $career->delete();

        return back();
    }

    public function massDestroy(MassDestroyCareerRequest $request)
    {
        $careers = Career::find(request('ids'));

        foreach ($careers as $career) {
            $career->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('career_create') && Gate::denies('career_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Career();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
