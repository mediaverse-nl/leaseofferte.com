@extends('layouts.admin')

@section('page_title', 'Pages')

@section('content')

    @component('admin.components.table', ['title' => 'Pages'])
        @slot('heading')
            <tr>
                <th>slug</th>
                <th>title</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th class="no-sort">options</th>
            </tr>
        @endslot
        @slot('body')
            @foreach($pages as $page)
                <tr {!! $page->trashed() ? 'class="table-danger"' : ''!!}>
                    <td>{!! $page->slug !!}</td>
                    <td>{!! $page->title !!}</td>
                    <td>{!! $page->created_at !!}</td>
                    <td>{!! $page->updated_at !!}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.pages.destroy', $page->id]]) !!}
                            <button class="btn btn-danger btn-circle btn-sm float-right" type="submit" value="">
                                @if($page->trashed())
                                    <i class="fas fa-history"></i>
                                @else
                                    <i class="fas fa-trash"></i>
                                @endif
                            </button>
                        {!! Form::close() !!}
                        <a href="{!! route('admin.pages.edit', $page->id) !!}" class="btn btn-warning btn-circle btn-sm float-right">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection

@push('scripts')

@endpush