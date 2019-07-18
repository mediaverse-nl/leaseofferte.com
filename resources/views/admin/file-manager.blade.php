@extends('layouts.admin')

@section('page_title', 'File Manager')

@section('content')
    <iframe class="shadow" src="{!! route('unisharp.lfm.show') !!}" style="width: 100%; height: 80vh; overflow: hidden; border: none;"></iframe>
    <hr>
@endsection

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>

    <script>
//        function resizeIframe(obj) {
//            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
//        }
    </script>
@endpush