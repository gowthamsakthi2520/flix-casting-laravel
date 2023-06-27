@extends('backend.layouts.header')
@section('content')
       <!--start main content-->
       <main class="page-content">
         <!--end row-->
         <div class="add-custmer d-none">
           
         </div>
         <div class="card">
            <div class="card-header bg-transparent">
               <div class="d-flex align-items-center">
                  <div class="">
                     <h6 class="mb-0 fw-bold dashboard-title">Profile</h6>
                  </div>
               </div>
            </div>
            <div class="card border-0">
               <div class="card-body">
                 <!-- Form details -->
                  <form class="row g-3"  id="profile_form" method="POST" enctype="multipart/form-data">
                    @csrf
                      @method('POST')
                    <input type="hidden" id="url" value="{{route('profile-update')}}">

                     <div class="col-md-12">
                        <label for="inputName" class="form-label pt-3 fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$users->name}}" placeholder="">
                        <span class="text-danger name"></span>
                        <div class="col-md-12">
                        <label for="inputName" class="form-label pt-3 fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$users->email}}" placeholder=" ">
                        <span class="text-danger email"></span>

                    

                        
                        <div class="col-md-12">
                        <label for="inputName" class="form-label pt-3 fw-bold">Image</label>
                       <input type="file" class="form-control" id="image" name="image" placeholder=" Add Gallery Image">
                       <div class="col-md-12">
                       
                        </div>
                       <span class="text-danger image"></span>
                    </div>
                    <div class="col-12 pt-5">
                    <img src="{{asset($users->image)}}" width="10%"/>
                        </div>
                    
                        <div class="col-12 pt-5">
                           <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                     </div>
                  </form> 
               </div>
            </div>
         </div>
      </main>
      <!--end main content-->

@endsection