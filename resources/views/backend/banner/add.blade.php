@extends('backend.layouts.header')
@section('content')
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sa-simple">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Banner</li>
                    <li class="breadcrumb-item">Add Banner</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    </div>
    <!--end row-->

    <div class="card">
        <div class="card-body">
            <form id="add_banners" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-md-12">
                    <label class="form-label">Title</label>
                    <input class="form-control" name="banner_title" id="banner_title">
                    <input type="hidden" id="url" value="{{route('banner.store')}}">
                    <span class="text-danger banner_title"></span>
                </div>

                <div class="col-md-12">
                    <label for="banner_images" class="form-label">Select a Banner</label>
                    <input type="file" class="form-control" id="banner_images" name="banner_images">
                    <span class="text-danger banner_images"></span>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="banner_description" id="banner_description" rows="5"></textarea>
                    <span class="text-danger banner_description"></span>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</main>
<!--end main content-->
@endsection
