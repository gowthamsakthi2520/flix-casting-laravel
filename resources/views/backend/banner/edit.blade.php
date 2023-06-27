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
                    <li class="breadcrumb-item">Edit Banner</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    </div>
    <!--end row-->

    <div class="card">
        <div class="card-body">
            <form id="update_banners" class="row g-3"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="col-md-12">
                    <label class="form-label">Title</label>
                    <input class="form-control" name="banner_title" id="banner_title" value="{{$banner->banner_title}}">
                    <input type="hidden" id="url" value="{{route('banner.update',$banner->id)}}">
                    <input type="hidden" id="banner_id" value="{{$banner->id}}">
                    <span class="text-danger banner_title"></span>
                </div>

                <div class="col-md-12">
                    <label for="banner_images" class="form-label">Select a Banner</label>
                    <input type="file" class="form-control" id="banner_images" name="banner_images" >
                    @foreach(explode(',',$banner->banner_images) as $img)
                    <img src="{{asset($img)}}" alt="banner_images" width="100" height="100">
                    @endforeach
                    <label for="" class="form-label">{{$banner->banner_images}}</label>
                    <span class="text-danger banner_images"></span>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="banner_description" id="banner_description" rows="5">{{$banner->banner_description}}</textarea>
                    <input type="hidden" name="banner_id" value="{{$banner->id}}">
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
