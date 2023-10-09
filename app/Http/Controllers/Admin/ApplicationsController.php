<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Career;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApplicationsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Application::with(['user', 'skills_training'])->select(sprintf('%s.*', (new Application)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'application_show';
                $editGate      = 'application_edit';
                $deleteGate    = 'application_delete';
                $crudRoutePart = 'applications';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('idno', function ($row) {
                return $row->idno ? $row->idno : '';
            });

            $table->editColumn('gender', function ($row) {
                return $row->gender ? Application::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->editColumn('passport', function ($row) {
                return $row->passport ? Application::PASSPORT_SELECT[$row->passport] : '';
            });
            $table->editColumn('passport_no', function ($row) {
                return $row->passport_no ? $row->passport_no : '';
            });

            $table->editColumn('pwd', function ($row) {
                return $row->pwd ? Application::PWD_SELECT[$row->pwd] : '';
            });
            $table->editColumn('parent_name', function ($row) {
                return $row->parent_name ? $row->parent_name : '';
            });
            $table->editColumn('parent_contact', function ($row) {
                return $row->parent_contact ? $row->parent_contact : '';
            });
            $table->editColumn('subcounty', function ($row) {
                return $row->subcounty ? Application::SUBCOUNTY_SELECT[$row->subcounty] : '';
            });
            $table->editColumn('ward', function ($row) {
                return $row->ward ? Application::WARD_SELECT[$row->ward] : '';
            });
            $table->editColumn('are_you_intrested_in', function ($row) {
                return $row->are_you_intrested_in ? Application::ARE_YOU_INTRESTED_IN_SELECT[$row->are_you_intrested_in] : '';
            });
            $table->addColumn('skills_training_title', function ($row) {
                return $row->skills_training ? $row->skills_training->title : '';
            });

            $table->editColumn('education', function ($row) {
                return $row->education ? Application::EDUCATION_SELECT[$row->education] : '';
            });
            $table->editColumn('qualification', function ($row) {
                return $row->qualification ? $row->qualification : '';
            });
            $table->editColumn('grade', function ($row) {
                return $row->grade ? $row->grade : '';
            });
            $table->editColumn('year_of_experience', function ($row) {
                return $row->year_of_experience ? Application::YEAR_OF_EXPERIENCE_SELECT[$row->year_of_experience] : '';
            });
            $table->editColumn('position', function ($row) {
                return $row->position ? $row->position : '';
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
            $table->editColumn('id_copy', function ($row) {
                if ($photo = $row->id_copy) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'skills_training', 'image', 'id_copy']);

            return $table->make(true);
        }

        $users   = User::get();
        $careers = Career::get();

        return view('admin.applications.index', compact('users', 'careers'));
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills_trainings = Career::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('skills_trainings', 'users'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $application->id]);
        }

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills_trainings = Career::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('user', 'skills_training');

        return view('admin.applications.edit', compact('application', 'skills_trainings', 'users'));
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

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('user', 'skills_training');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        $applications = Application::find(request('ids'));

        foreach ($applications as $application) {
            $application->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('application_create') && Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Application();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
