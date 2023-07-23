@extends('master')

@section('title' , 'Add Product')

@section("content")
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product Form</h4>
                <hr/>
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form class="form-horizontal p-t-20" method="POST" action="{{route('upload.product')}}" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="row mb-3 mt-3">
                            <label for="" class="col-sm-3">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="exampleInputuname3" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="" class="col-sm-3 control-label">Product Stock Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" id="exampleInputuname6" placeholder="Product Stock Amount">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="" class="col-sm-3">Product Price<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="price" id="exampleInputuname7" placeholder="Regular Price">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="" class="col-sm-3">Product Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description" id="exampleInputEmail9" placeholder="Product Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label class="col-sm-3 " for="web">Feature Image<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="form-control"  accept="image/*">
                            </div>
                        </div>
                        <div class=" row mb-3 mt-3">
                            <label for="" class="col-sm-3 ">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" checked> Published</label>
                                <label><input type="radio" name="status" value="2"> Unpublished</label>
                            </div>
                        </div>
                        <div class=" row mb-3 mt-3">
                            <div class=" col-sm-9">
                                <button type="submit" class="btn btn-success  text-white">Create New Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection