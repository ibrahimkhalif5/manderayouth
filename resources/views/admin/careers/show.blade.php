@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.career.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.careers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.id') }}
                        </th>
                        <td>
                            {{ $career->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.opportunity_type') }}
                        </th>
                        <td>
                            {{ App\Models\Career::OPPORTUNITY_TYPE_SELECT[$career->opportunity_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.title') }}
                        </th>
                        <td>
                            {{ $career->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.description') }}
                        </th>
                        <td>
                            {!! $career->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.training_mode') }}
                        </th>
                        <td>
                            {{ App\Models\Career::TRAINING_MODE_SELECT[$career->training_mode] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.venue') }}
                        </th>
                        <td>
                            {{ $career->venue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.start_date') }}
                        </th>
                        <td>
                            {{ $career->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.end_date') }}
                        </th>
                        <td>
                            {{ $career->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.career.fields.image') }}
                        </th>
                        <td>
                            @if($career->image)
                                <a href="{{ $career->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $career->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.careers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection