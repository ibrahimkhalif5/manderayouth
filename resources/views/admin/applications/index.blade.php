@extends('layouts.admin')
@section('content')
@can('application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Application', 'route' => 'admin.applications.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.application.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Application">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.application.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.idno') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.passport') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.passport_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.passport_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.pwd') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.parent_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.parent_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.subcounty') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.ward') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.are_you_intrested_in') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.skills_training') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.education') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.qualification') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.grade') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.year_of_experience') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.position') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.image') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.id_copy') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::GENDER_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::PASSPORT_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::PWD_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::SUBCOUNTY_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::WARD_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::ARE_YOU_INTRESTED_IN_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($careers as $key => $item)
                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::EDUCATION_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::YEAR_OF_EXPERIENCE_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.applications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'idno', name: 'idno' },
{ data: 'dob', name: 'dob' },
{ data: 'gender', name: 'gender' },
{ data: 'mobile', name: 'mobile' },
{ data: 'passport', name: 'passport' },
{ data: 'passport_no', name: 'passport_no' },
{ data: 'passport_date', name: 'passport_date' },
{ data: 'pwd', name: 'pwd' },
{ data: 'parent_name', name: 'parent_name' },
{ data: 'parent_contact', name: 'parent_contact' },
{ data: 'subcounty', name: 'subcounty' },
{ data: 'ward', name: 'ward' },
{ data: 'are_you_intrested_in', name: 'are_you_intrested_in' },
{ data: 'skills_training_title', name: 'skills_training.title' },
{ data: 'education', name: 'education' },
{ data: 'qualification', name: 'qualification' },
{ data: 'grade', name: 'grade' },
{ data: 'year_of_experience', name: 'year_of_experience' },
{ data: 'position', name: 'position' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'id_copy', name: 'id_copy', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Application').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection