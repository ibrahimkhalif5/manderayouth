@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.application.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <td>
                            {{ $application->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.user') }}
                        </th>
                        <td>
                            {{ $application->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.idno') }}
                        </th>
                        <td>
                            {{ $application->idno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.dob') }}
                        </th>
                        <td>
                            {{ $application->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Application::GENDER_SELECT[$application->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mobile') }}
                        </th>
                        <td>
                            {{ $application->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.passport') }}
                        </th>
                        <td>
                            {{ App\Models\Application::PASSPORT_SELECT[$application->passport] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.passport_no') }}
                        </th>
                        <td>
                            {{ $application->passport_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.passport_date') }}
                        </th>
                        <td>
                            {{ $application->passport_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.pwd') }}
                        </th>
                        <td>
                            {{ App\Models\Application::PWD_SELECT[$application->pwd] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.parent_name') }}
                        </th>
                        <td>
                            {{ $application->parent_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.parent_contact') }}
                        </th>
                        <td>
                            {{ $application->parent_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.subcounty') }}
                        </th>
                        <td>
                            {{ App\Models\Application::SUBCOUNTY_SELECT[$application->subcounty] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.ward') }}
                        </th>
                        <td>
                            {{ App\Models\Application::WARD_SELECT[$application->ward] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.are_you_intrested_in') }}
                        </th>
                        <td>
                            {{ App\Models\Application::ARE_YOU_INTRESTED_IN_SELECT[$application->are_you_intrested_in] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.skills_training') }}
                        </th>
                        <td>
                            {{ $application->skills_training->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.education') }}
                        </th>
                        <td>
                            {{ App\Models\Application::EDUCATION_SELECT[$application->education] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.qualification') }}
                        </th>
                        <td>
                            {{ $application->qualification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.grade') }}
                        </th>
                        <td>
                            {{ $application->grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.year_of_experience') }}
                        </th>
                        <td>
                            {{ App\Models\Application::YEAR_OF_EXPERIENCE_SELECT[$application->year_of_experience] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.position') }}
                        </th>
                        <td>
                            {{ $application->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.duties_responsibilities') }}
                        </th>
                        <td>
                            {!! $application->duties_responsibilities !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.image') }}
                        </th>
                        <td>
                            @if($application->image)
                                <a href="{{ $application->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $application->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id_copy') }}
                        </th>
                        <td>
                            @if($application->id_copy)
                                <a href="{{ $application->id_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $application->id_copy->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection