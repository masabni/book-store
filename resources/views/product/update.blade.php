@extends('layouts.app')
@section('style')
    <link type="text/css" rel="stylesheet" href="{{asset('css/tooltipster.bundle.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/summernote.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/fileinput.min.css')}}">
    <style>
        .chosen-container-single .chosen-single {
            height: 36px;
            line-height: 30px;
        }

        .chosen-container-single .chosen-single div {
            top: 6px;
        }

        .chosen-container-single .chosen-single abbr {
            top: 12px;
        }

        .kv-upload-progress > .progress, .fileinput-cancel-button {
            display: none;
        }

        .file-caption-main .input-group-btn {
            display: block;
        }

        .kv-fileinput-caption {
            height: 35px !important;
        }

        .fileinput-upload.fileinput-upload-button {
            display: none;
        }

        .fileinput-remove.fileinput-remove-button {
            display: none;
        }

        .file-thumbnail-footer {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div id="content" class="bg-container">
        @include('partials.breadcrumb',['page_name' => "Update Product"])
        <div class="outer">
            <div class="inner bg-light bg-container">
                <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header bg-white">
                                    Product Information
                                </div>
                                <div class="card-block">
                                    <fieldset>
                                        <div class="form-group row m-t-20">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="name"
                                                               class="col-form-label required form-group-horizontal">
                                                            Product Name
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" required value="{{$product->name}}"
                                                                   class="form-control" id="name" name="name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="category_id"
                                                               class="col-form-label required form-group-horizontal">
                                                            Category
                                                        </label>
                                                        <div class="input-group">
                                                            <select class="form-control" required id="category_id"
                                                                    name="category_id">
                                                                <option></option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}"
                                                                            @if($category->id == $product->category_id) selected="selected" @endif>{{$category->name}}</option>
                                                                @endforeach()
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="sub_category_id"
                                                               class="col-form-label form-group-horizontal">
                                                            Sub Category
                                                        </label>
                                                        <div class="input-group">
                                                            <select class="form-control" id="sub_category_id"
                                                                    name="sub_category_id">
                                                                <option></option>
                                                                @foreach($sub_categories as $sub_category)
                                                                    <option value="{{$sub_category->id}}"
                                                                            @if($sub_category->id == $product->sub_category_id) selected="selected" @endif>{{$sub_category->name}}</option>
                                                                @endforeach()
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="image"
                                                       class="col-form-label form-group-horizontal">
                                                    Product Image
                                                </label>
                                                <input type="file" accept="image/*" class="image-upload file-loading"
                                                       id="image" name="image">
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-35">
                                            <div class="col-lg-5">
                                                <label for="author_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Author
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-control" required id="author_id"
                                                            name="author_id">
                                                        <option></option>
                                                        @foreach($authors as $author)
                                                            <option value="{{$author->id}}"
                                                                    @if($author->id == $product->author_id) selected="selected" @endif>{{$author->name}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5  push-lg-2">
                                                <label for="publisher_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Publisher
                                                </label>
                                                <div class="input-group">
                                                    <select class="form-control" required id="publisher_id"
                                                            name="publisher_id">
                                                        <option></option>
                                                        @foreach($publishers as $publisher)
                                                            <option value="{{$publisher->id}}"
                                                                    @if($publisher->id == $product->publisher_id) selected="selected" @endif>{{$publisher->name}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label for="author_role_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Author Role
                                                </label>
                                                <i class="fa fa-info-circle ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ex. Author, Co-Writer, Ghost-Rider, Translator, Illustrator"></i>
                                                <div class="input-group">
                                                    <select class="form-control chzn-select" required tabindex="2"
                                                            id="author_role_id" name="author_role_id">
                                                        <option></option>
                                                        @foreach($author_roles as $author_role)
                                                            <option value="{{$author_role->id}}"
                                                                    @if($author_role->id == $product->author_role_id) selected="selected" @endif>{{$author_role->role}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="publisher_role_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Publisher Role
                                                </label>
                                                <i class="fa fa-info-circle ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ex. Distributor, Publisher"></i>
                                                <div class="input-group">
                                                    <select class="form-control chzn-select" required tabindex="2"
                                                            id="publisher_role_id" name="publisher_role_id">
                                                        <option></option>
                                                        @foreach($publisher_roles as $publisher_role)
                                                            <option value="{{$publisher_role->id}}"
                                                                    @if($publisher_role->id == $product->publisher_role_id) selected="selected" @endif>{{$publisher_role->role}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Financial Details
                                </div>
                                <div class="card-block">
                                    <fieldset>
                                        <div class="form-group row m-t-20">
                                            <div class="col-lg-5">
                                                <label for="selling_price"
                                                       class="col-form-label required form-group-horizontal">
                                                    Selling Price
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" required value="{{$product->selling_price}}"
                                                           class="form-control" id="selling_price" name="selling_price">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="cost_price"
                                                       class="col-form-label required form-group-horizontal">
                                                    Cost Price
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" required value="{{$product->cost_price}}"
                                                           class="form-control" id="cost_price" name="cost_price">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Product Details
                                </div>
                                <div class="card-block">
                                    <fieldset>
                                        <div class="form-group row m-t-20">
                                            <div class="col-lg-5">
                                                <label for="isbn"
                                                       class="col-form-label form-group-horizontal">
                                                    ISBN
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                    <input type="text" value="{{$product->isbn}}" class="form-control"
                                                           id="isbn" name="isbn">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="barcode"
                                                       class="col-form-label form-group-horizontal">
                                                    Barcode
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                    <input type="text" value="{{$product->barcode}}"
                                                           class="form-control" id="barcode" name="barcode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-35">
                                            <div class="col-lg-5">
                                                <label for="product_type_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Product Type
                                                </label>
                                                <i class="fa fa-info-circle ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ex. Book, CD, DVD, Magazine"></i>
                                                <div class="input-group">
                                                    <select class="form-control chzn-select" required tabindex="2"
                                                            id="product_type_id" name="product_type_id">
                                                        <option></option>
                                                        @foreach($product_types as $product_type)
                                                            <option value="{{$product_type->id}}"
                                                                    @if($product_type->id == $product->product_type_id) selected="selected" @endif>{{$product_type->type}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="edition"
                                                       class="col-form-label form-group-horizontal">
                                                    Edition
                                                </label>
                                                <div class="input-group">
                                                    <input type="text" value="{{$product->edition}}"
                                                           class="form-control" id="edition" name="edition">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <label for="cover_type_id"
                                                       class="col-form-label required form-group-horizontal">
                                                    Cover Type
                                                </label>
                                                <i class="fa fa-info-circle ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ex. Normal, Art"></i>
                                                <div class="input-group">
                                                    <select class="form-control chzn-select" required tabindex="2"
                                                            id="cover_type_id" name="cover_type_id">
                                                        <option></option>
                                                        @foreach($cover_types as $cover_type)
                                                            <option value="{{$cover_type->id}}"
                                                                    @if($cover_type->id == $product->cover_type_id) selected="selected" @endif>{{$cover_type->type}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="product_size_id"
                                                       class="col-form-label form-group-horizontal">
                                                    Product Size
                                                </label>
                                                <i class="fa fa-info-circle ml-1" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ex. HxW: 17x12 | 17x15 | 19x13 | 20x14 | 20x27"></i>
                                                <div class="input-group">
                                                    <select class="form-control chzn-select" tabindex="2"
                                                            id="product_size_id" name="product_size_id">
                                                        <option></option>
                                                        @foreach($product_sizes as $product_size)
                                                            <option value="{{$product_size->id}}"
                                                                    @if($product_size->id == $product->product_size_id) selected="selected" @endif>{{$product_size->size}}</option>
                                                        @endforeach()
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-35">
                                            <div class="col-lg-5">
                                                <label for="product_weight"
                                                       class="col-form-label form-group-horizontal">
                                                    Product Weight
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-balance-scale"></i></span>
                                                    <input type="text" value="{{$product->product_weight}}"
                                                           class="form-control" id="product_weight"
                                                           name="product_weight">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="num_pages"
                                                       class="col-form-label form-group-horizontal">
                                                    #Nb Of Pages
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                                    <input type="text" value="{{$product->num_pages}}"
                                                           class="form-control" id="num_pages" name="num_pages">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <label for="release_date"
                                                       class="col-form-label form-group-horizontal">
                                                    Release Date
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                    <input type="text" value="{{$product->release_date}}"
                                                           class="form-control datepicker" id="release_date"
                                                           name="release_date">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Product Files
                                </div>
                                <div class="card-block">
                                    <fieldset>
                                        <div class="form-group row m-t-20">
                                            <div class="col-lg-5">
                                                <label for="pdf_link"
                                                       class="col-form-label form-group-horizontal">
                                                    E-Book / PDF Link
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                                class="fa  fa-file-pdf-o"></i></span>
                                                    <input type="text" value="{{$product->pdf_link}}"
                                                           class="form-control" id="pdf_link" name="pdf_link">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 push-lg-2">
                                                <label for="audio_file"
                                                       class="col-form-label form-group-horizontal">
                                                    Audio File
                                                </label>
                                                <div class="input-group">
                                                <span class="input-group-addon"><i
                                                            class="fa  fa-file-audio-o"></i></span>
                                                    <input type="text" value="{{$product->audio_file}}"
                                                           class="form-control" id="audio_file" name="audio_file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-40">
                                            <div class="col-lg-12">
                                                <div class="card summer_note">
                                                    <div class="card-header bg-white">
                                                        Description
                                                    </div>
                                                    <textarea id="description"
                                                              name="description">{{$product->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row m-t-20">
                                        <div class="col-lg-2 push-lg-10">
                                            <button class="btn  btn-primary" type="submit">Update</button>
                                            <a class="m-r-5 btn text-primary" href="/products">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('js/tooltipster.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/chosen.jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/summernote.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/theme.js')}}"></script>
    <script>
        $(function () {
            $('#category_id').on('change', function () {
                $.get('/sub-category', {'category': this.value}, function (res) {
                    if (res.success)
                        $('#sub_category_id').html(res.html);
                    else
                        console.error(res.error);
                });
            });
            $(".chzn-select").chosen({allow_single_deselect: true});
            // Date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true,
                orientation: "bottom"
            });
            //summernote text editor
            $('#description').summernote({
                height: 170
            });
            // image upload
            let image = {!! json_encode($product->image) !!};
            if (image)
                image = "storage/" + image;
            $(".image-upload").fileinput({
                initialPreview: [
                    image,
                ],
                initialPreviewAsData: true,
                theme: "fa",
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pick Image",
                allowedFileExtensions: ['png', 'jpg', 'jpeg', '.gif', 'bmp'],
                showClose: false,
            });
        })
    </script>
@endsection