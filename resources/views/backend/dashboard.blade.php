@extends('backend.layouts.header')
@section('content')
<main class="page-content">
         <div class="row ">
            <div class="col-md-3">
               <div class="card radius-10 border-0 border-start border-primary border-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-1">Main Service</p>
                           <h4 class="mb-0 text-primary">5</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                       <i class="bi bi-file-earmark-check"></i>
                </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card radius-10 border-0 border-start border-success border-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Sub Service</p>
                           <h4 class="mb-0 text-success">12</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-danger text-white">
                        <i class="bi bi-file-earmark-check"></i>
                </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card radius-10 border-0 border-start border-danger border-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-1">Gallery</p>
                           <h4 class="mb-0 text-danger">43</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                        <i class="bi bi-file-earmark-check"></i>
                </div>
                     </div>
                  </div>
               </div>
            </div>
			   <div class="col-md-3">
               <div class="card radius-10 border-0 border-start border-danger border-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-1">Videos</p>
                           <h4 class="mb-0 text-danger">56</h4>
                        </div>
                        <div class="ms-auto widget-icon  bg-warning text-white">
                        <i class="bi bi-file-earmark-check"></i>
                </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card radius-10 border-0 border-start border-danger border-4">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                           <p class="mb-1">Banner</p>
                           <h4 class="mb-0 text-danger">33</h4>
                        </div>
                        <div class="ms-auto widget-icon bg-dark text-white">
                        <i class="bi bi-file-earmark-check"></i>
                </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end row-->
         <div class="add-custmer d-none">
            <div>
               <button class="btn btn-primary"> <a href="customer-add.php"> Add Customer</a> <i class="bi bi-plus-lg"></i></button>
            </div>
         </div>
            <div class="card-header bg-transparent">
               <div class="d-flex align-items-center">
               </div>
</div>
         </div>
      </main>
      <!--end main content-->



@endsection