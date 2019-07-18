@extends('layouts.admin')

@section('page_title', 'Categories')

@section('content')

    @component('admin.components.table', ['title' => 'Products'])
        @slot('heading')
            <tr>
                <th>title</th>
                <th>sub category</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th class="no-sort">options</th>
            </tr>
        @endslot
        @slot('body')
            @foreach($categories as $page)
                <tr {!! $page->trashed() ? 'class="table-danger"' : ''!!}>
                    <td>{!! $page->title !!}</td>
                    <td>{!! $page->category_id != null ? $page->category->title : '' !!}</td>
                    <td>{!! $page->created_at !!}</td>
                    <td>{!! $page->updated_at !!}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.categories.destroy', $page->id]]) !!}
                        <button class="btn btn-danger btn-circle btn-sm float-right" type="submit" value="">
                            @if($page->trashed())
                                <i class="fas fa-history"></i>
                            @else
                                <i class="fas fa-trash"></i>
                            @endif
                        </button>
                        {!! Form::close() !!}
                        <a href="{!! route('admin.categories.edit', $page->id) !!}" class="btn btn-warning btn-circle btn-sm float-right">
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