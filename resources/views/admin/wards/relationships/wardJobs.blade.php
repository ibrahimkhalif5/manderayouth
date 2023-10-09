@can('job_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jobs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.job.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-wardJobs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.fullname') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.idno') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.passport') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.pwd') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.level_of_education') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.qualification') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.employer') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.exp_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.job_duties') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.id_copy') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.grade') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.parent_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.parent_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.passport_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.dob') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.intrested_fields') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.subcounty') }}
                        </th>
                        <th>
                            {{ trans('cruds.job.fields.ward') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                        <tr data-entry-id="{{ $job->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $job->id ?? '' }}
                            </td>
                            <td>
                                {{ $job->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $job->idno ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::GENDER_SELECT[$job->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $job->passport ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Job::PWD_SELECT[$job->pwd] ?? '' }}
                            </td>
                            <td>
                                {{ $job->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $job->level_of_education ?? '' }}
                            </td>
                            <td>
                                {{ $job->qualification ?? '' }}
                            </td>
                            <td>
                                {{ $job->employer ?? '' }}
                            </td>
                            <td>
                                {{ $job->exp_year ?? '' }}
                            </td>
                            <td>
                                {{ $job->position ?? '' }}
                            </td>
                            <td>
                                {{ $job->job_duties ?? '' }}
                            </td>
                            <td>
                                @if($job->image)
                                    <a href="{{ $job->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $job->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($job->id_copy)
                                    <a href="{{ $job->id_copy->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $job->grade ?? '' }}
                            </td>
                            <td>
                                {{ $job->email ?? '' }}
                            </td>
                            <td>
                                {{ $job->parent_name ?? '' }}
                            </td>
                            <td>
                                {{ $job->parent_no ?? '' }}
                            </td>
                            <td>
                                {{ $job->passport_date ?? '' }}
                            </td>
                            <td>
                                {{ $job->dob ?? '' }}
                            </td>
                            <td>
                                {{ $job->status ?? '' }}
                            </td>
                            <td>
                                {{ $job->intrested_fields ?? '' }}
                            </td>
                            <td>
                                {{ $job->subcounty->subcounty ?? '' }}
                            </td>
                            <td>
                                {{ $job->ward->ward ?? '' }}
                            </td>
                            <td>
                                @can('job_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jobs.show', $job->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_delete')
                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('job_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jobs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-wardJobs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection