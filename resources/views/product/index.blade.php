@extends('layouts.app')
@section('style')
    <link type="text/css" rel="stylesheet" href="{{asset('css/tooltipster.bundle.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
@endsection
@section('content')
    <div id="content" class="bg-container">
        @include('partials.breadcrumb',['page_name' => "Main Page"])
        <div class="outer">
            <div class="inner bg-light lter bg-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                Products
                                <a href="{{route('products.create')}}"
                                   class="btn btn-primary ml-2">
                                    <i class="fa fa-plus"></i> Add Product
                                </a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive m-t-35">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Selling Price</th>
                                            <th>Cost Price</th>
                                            <th>Edition</th>
                                            <th>Cover Type</th>
                                            <th>Product Size</th>
                                            <th>Product Weight</th>
                                            <th>#Nb Of Pages</th>
                                            <th>Release Date</th>
                                            {{--<th>E-Book / PDF Link</th>--}}
                                            {{--<th>Audio File</th>--}}
                                            {{--<th>ISBN</th>--}}
                                            {{--<th>Barcode</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th colspan="6">Showing {{$products->firstItem()}}
                                                to {{$products->lastItem()}} of {{$products->total()}} entries
                                            </th>
                                            <th colspan="8">{{$products->links()}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @forelse($products as $key => $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->product_type->type}}</td>
                                                <td>{{$product->author->name}}</td>
                                                <td>{{$product->publisher->name}}</td>
                                                <td>${{$product->selling_price}}</td>
                                                <td>${{$product->cost_price}}</td>
                                                <td>{{isset($product->edition) ? $product->edition : '-' }}</td>
                                                <td>{{$product->cover_type->type}}</td>
                                                {{--<td>{{optional($product->product_size)->size}}</td>--}}
                                                <td>{{isset($product->product_size->size) ? $product->product_size->size : '-' }}</td>
                                                <td>{{isset($product->product_weight) ? $product->product_weight : '-' }}</td>
                                                <td>{{isset($product->num_pages) ? $product->num_pages : '-' }}</td>
                                                <td>{{isset($product->release_date) ? $product->release_date : '-' }}</td>
                                                {{--<td>{{isset($product->pdf_link) ? $product->pdf_link : '-' }}</td>--}}
                                                {{--<td>{{isset($product->audio_file) ? $product->audio_file : '-' }}</td>--}}
                                                {{--<td>{{isset($product->isbn) ? $product->isbn : '-' }}</td>--}}
                                                {{--<td>{{isset($product->barcode) ? $product->barcode : '-' }}</td>--}}
                                                <td>
                                                    <a href="{{route('products.edit', $product->id)}}"
                                                       class="btn btn-primary mb-1" data-toggle="tooltip"
                                                       data-placement="top" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form id="delete-product" action="{{ route('products.destroy', $product->id) }}" method="post" class="hidden-xs-up">
                                                        {{csrf_field()}}
                                                        {{method_field('delete')}}
                                                    </form>
                                                        <button class="btn btn-danger mb-1 product-remove"
                                                                onclick="confirmDelete('delete-product')" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td valign="top" colspan="10" class="dataTables_empty">No matching
                                                    records found
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('js/tooltipster.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script>
        function confirmDelete(item_id) {
            swal({
                title: 'Are you sure?',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#EF6F6C',
                cancelButtonColor: '#ff9933',
                confirmButtonText: 'Delete'
            }).then((willDelete) => {
                    if (willDelete)
                        $('#'+item_id).submit();
            });
        }
    </script>
@endsection