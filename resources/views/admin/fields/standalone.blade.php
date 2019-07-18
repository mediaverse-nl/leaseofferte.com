@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!! $options['wrapperAttrs'] !!}>
    @endif
@endif
{{--<div class="form-group">--}}
    @if ($showLabel && $options['label'] !== false && $options['label_show'])
        {{Form::customLabel($name, $options['label'], $options['label_attr'])}}
    @endif
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="imgThumbnail" data-preview="imgHolder" class="btn btn-primary text-white" style="border-radius: 5px 0px 0px 5px !important;">
                <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        @if ($showField)
            {{Form::input($type, $name, $options['value'], array_merge([
                'disabled',
                'id' => 'imgThumbnail',
                'style' => 'border-radius: 0px 5px 5px 0px !important;'], $options['attr']) )}}
            @include('vendor/laravel-form-builder/help_block')
        @endif
        <input type="hidden" id="imgThumbnailCopy" class="form-control" name="images" value="" style="">
        @include('vendor/laravel-form-builder/errors')
    </div>
    <div id="imgHolder" style="margin:15px 0px 15px 5px; max-height:100px;"></div>

@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "{!! config('lfm.url_prefix') !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

        function getImagePath(el) {
            $('#imgThumbnailCopy').val(el);
        }

        getImagePath($('#imgThumbnail').val());

        $('#imgThumbnail').change(function() {
            getImagePath($(this).val());
        });
    </script>
@endpush