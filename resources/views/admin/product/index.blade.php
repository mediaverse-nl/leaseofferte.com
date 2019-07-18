@extends('layouts.admin')

@section('page_title', 'Products')

@section('content')

    @component('admin.components.table', ['title' => 'Products'])
        @slot('heading')
            <tr>
                <th>title</th>
                <th>image</th>
                <th>category</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th class="no-sort">options</th>
            </tr>
        @endslot
        @slot('body')
            @foreach($products as $product)
                <tr {!! $product->trashed() ? 'class="table-danger"' : ''!!}>
                    <td>{!! $product->title !!}</td>
                    <td><img src="{!! $product->thumbnail() !!}" alt="" style="height: 50px;"></td>
                    <td>{!! $product->category_id !!}</td>
                    <td>{!! $product->created_at !!}</td>
                    <td>{!! $product->updated_at !!}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.products.destroy', $product->id]]) !!}
                            <button class="btn btn-danger btn-circle btn-sm float-right" type="submit" value="">
                                @if($product->trashed())
                                    <i class="fas fa-history"></i>
                                @else
                                    <i class="fas fa-trash"></i>
                                @endif
                            </button>
                        {!! Form::close() !!}
                        <a href="{!! route('admin.products.edit', $product->id) !!}" class="btn btn-warning btn-circle btn-sm float-right">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

    <hr>

@endsection

@push('scripts')

@endpush