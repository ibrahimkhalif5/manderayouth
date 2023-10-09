@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partners.update", [$partner->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="partner">{{ trans('cruds.partner.fields.partner') }}</label>
                <input class="form-control {{ $errors->has('partner') ? 'is-invalid' : '' }}" type="text" name="partner" id="partner" value="{{ old('partner', $partner->partner) }}" required>
                @if($errors->has('partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_logo">{{ trans('cruds.partner.fields.partner_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('partner_logo') ? 'is-invalid' : '' }}" id="partner_logo-dropzone">
                </div>
                @if($errors->has('partner_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partner.fields.partner_logo_helper') }}</span>
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
    Dropzone.options.partnerLogoDropzone = {
    url: '{{ route('admin.partners.storeMedia') }}',
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
      $('form').find('input[name="partner_logo"]').remove()
      $('form').append('<input type="hidden" name="partner_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="partner_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($partner) && $partner->partner_logo)
      var file = {!! json_encode($partner->partner_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="partner_logo" value="' + file.file_name + '">')
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