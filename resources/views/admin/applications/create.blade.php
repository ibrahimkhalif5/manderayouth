@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.application.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="idno">{{ trans('cruds.application.fields.idno') }}</label>
                <input class="form-control {{ $errors->has('idno') ? 'is-invalid' : '' }}" type="number" name="idno" id="idno" value="{{ old('idno', '') }}" step="1" required>
                @if($errors->has('idno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.idno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.application.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.application.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" id="mobile" value="{{ old('mobile', '') }}" step="1" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.passport') }}</label>
                <select class="form-control {{ $errors->has('passport') ? 'is-invalid' : '' }}" name="passport" id="passport" required>
                    <option value disabled {{ old('passport', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::PASSPORT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('passport', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('passport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.passport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_no">{{ trans('cruds.application.fields.passport_no') }}</label>
                <input class="form-control {{ $errors->has('passport_no') ? 'is-invalid' : '' }}" type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', '') }}">
                @if($errors->has('passport_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passport_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.passport_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_date">{{ trans('cruds.application.fields.passport_date') }}</label>
                <input class="form-control date {{ $errors->has('passport_date') ? 'is-invalid' : '' }}" type="text" name="passport_date" id="passport_date" value="{{ old('passport_date') }}">
                @if($errors->has('passport_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passport_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.passport_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.pwd') }}</label>
                <select class="form-control {{ $errors->has('pwd') ? 'is-invalid' : '' }}" name="pwd" id="pwd" required>
                    <option value disabled {{ old('pwd', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::PWD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pwd', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pwd'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pwd') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.pwd_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parent_name">{{ trans('cruds.application.fields.parent_name') }}</label>
                <input class="form-control {{ $errors->has('parent_name') ? 'is-invalid' : '' }}" type="text" name="parent_name" id="parent_name" value="{{ old('parent_name', '') }}" required>
                @if($errors->has('parent_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.parent_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parent_contact">{{ trans('cruds.application.fields.parent_contact') }}</label>
                <input class="form-control {{ $errors->has('parent_contact') ? 'is-invalid' : '' }}" type="number" name="parent_contact" id="parent_contact" value="{{ old('parent_contact', '') }}" step="1" required>
                @if($errors->has('parent_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.parent_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.subcounty') }}</label>
                <select class="form-control {{ $errors->has('subcounty') ? 'is-invalid' : '' }}" name="subcounty" id="subcounty" required>
                    <option value disabled {{ old('subcounty', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::SUBCOUNTY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('subcounty', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcounty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subcounty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.subcounty_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.ward') }}</label>
                <select class="form-control {{ $errors->has('ward') ? 'is-invalid' : '' }}" name="ward" id="ward" required>
                    <option value disabled {{ old('ward', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::WARD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ward', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ward'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ward') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.ward_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.are_you_intrested_in') }}</label>
                <select class="form-control {{ $errors->has('are_you_intrested_in') ? 'is-invalid' : '' }}" name="are_you_intrested_in" id="are_you_intrested_in" required>
                    <option value disabled {{ old('are_you_intrested_in', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::ARE_YOU_INTRESTED_IN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('are_you_intrested_in', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('are_you_intrested_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('are_you_intrested_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.are_you_intrested_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skills_training_id">{{ trans('cruds.application.fields.skills_training') }}</label>
                <select class="form-control select2 {{ $errors->has('skills_training') ? 'is-invalid' : '' }}" name="skills_training_id" id="skills_training_id">
                    @foreach($skills_trainings as $id => $entry)
                        <option value="{{ $id }}" {{ old('skills_training_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills_training'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills_training') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.skills_training_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.education') }}</label>
                <select class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" name="education" id="education">
                    <option value disabled {{ old('education', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::EDUCATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qualification">{{ trans('cruds.application.fields.qualification') }}</label>
                <input class="form-control {{ $errors->has('qualification') ? 'is-invalid' : '' }}" type="text" name="qualification" id="qualification" value="{{ old('qualification', '') }}" required>
                @if($errors->has('qualification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qualification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.qualification_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grade">{{ trans('cruds.application.fields.grade') }}</label>
                <input class="form-control {{ $errors->has('grade') ? 'is-invalid' : '' }}" type="text" name="grade" id="grade" value="{{ old('grade', '') }}" required>
                @if($errors->has('grade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.year_of_experience') }}</label>
                <select class="form-control {{ $errors->has('year_of_experience') ? 'is-invalid' : '' }}" name="year_of_experience" id="year_of_experience" required>
                    <option value disabled {{ old('year_of_experience', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::YEAR_OF_EXPERIENCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('year_of_experience', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('year_of_experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year_of_experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.year_of_experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.application.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', '') }}">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duties_responsibilities">{{ trans('cruds.application.fields.duties_responsibilities') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('duties_responsibilities') ? 'is-invalid' : '' }}" name="duties_responsibilities" id="duties_responsibilities">{!! old('duties_responsibilities') !!}</textarea>
                @if($errors->has('duties_responsibilities'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duties_responsibilities') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.duties_responsibilities_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.application.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_copy">{{ trans('cruds.application.fields.id_copy') }}</label>
                <div class="needsclick dropzone {{ $errors->has('id_copy') ? 'is-invalid' : '' }}" id="id_copy-dropzone">
                </div>
                @if($errors->has('id_copy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_copy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.id_copy_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.applications.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $application->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->image)
      var file = {!! json_encode($application->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.idCopyDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="id_copy"]').remove()
      $('form').append('<input type="hidden" name="id_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="id_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->id_copy)
      var file = {!! json_encode($application->id_copy) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="id_copy" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection