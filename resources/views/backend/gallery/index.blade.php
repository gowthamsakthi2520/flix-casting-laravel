@extends('backend.layouts.header')
@section('content')
<div class="modal fade" id="gallery_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                 <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">View Gallery</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <span class="gallery_content">

                                       </span>
                                       

                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <!-- <button type="button" class="btn btn-primary">Submit</button> -->
                                    </div>
                                 </div>
                              </div>            
                           </div>
                            <!-- End modal -->
    
               </div>

 <!-- modal -->
 <div class="modal fade" id="gallery_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"><span class="modal_title">Add</span> Gallery</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form  enctype="multipart/form-data" id="gallery_form">
                                      @csrf
                                 
                                    <input type="hidden" id="url">
                                    <div class="col-md-12">
                                             <label class="form-label pt-3 fw-bold" for="customFile">Main Services</label>
                                                <select name="service_id" id="service_id" class="form-control input">
                                                <option value="" placeholder="Select Service"></option>
                                                @foreach($services as $service)
                                                   <option value="{{$service->id}}">{{$service->service_name}}</option>
                                                @endforeach
                                                </select>
                                                <span class="text-danger service_id"></span>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="inputName" class="form-label pt-3 fw-bold">Gallery</label>
                                                <input type="file" class="form-control" name="image" id="image" placeholder=" Add Gallery Image">
                                                <img src="" class="edit_img" style="display:none;" width=200 height=100>
                                                <span class="text-danger image"></span>
                                                <div class="my-3 d-flex admin-gallery">  
                                             
                                                </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary"><span class="modal_button">Submit</span></button>
                                    </div>
                                    </form>
                                 </div>
                              </div>            
                           </div>
                            <!-- End modal -->
    
               </div>

<main class="page-content">
         <!--end row-->
       
         <div class="card">
            <div class="card-header bg-transparent">
               <div class="d-flex align-items-center  justify-content-between">
                  <div class="">
                     <h6 class="mb-0 fw-bold dashboard-title">Gallery</h6>
                  </div>
                    <div class="add-custmer">
            <div>
            <button class="btn btn-primary gallery_add" data-bs-toggle="modal" data-bs-target="#gallery_modal"> <a href="#" ><i class="bi bi-plus-lg"></i> Add </a></button>
            </div>
         </div>
               </div>
            </div>
            <div class="card border-0">
               <div class="card-body">
                  <div class="table-responsivse">
                    <div class="table-responsive white-space-nowrap">
                     <table class="table align-middle" id="galleryList">
                        <thead class="table-light">
                           <tr>
                              <th>S NO</th>
                              <th>Main service</th>
                              <th>Gallery</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                         

                        </tbody>
						  </table>
                  </div>
               </div>
            </div>
         </div>
      </main>

@endsection

@section('scripts')
<script>
   $(document).ready(function() {

var reporttables =  $('#galleryList').DataTable({
  "order": [[ 0, "desc" ]],
      "serverSide": true,
  "stateSave": true,
      'processing': true,
      oLanguage: {sProcessing: '<div class="lds-css"><div style="width:100%;height:100%" class="lds-eclipse"><div></div><p>Please wait while we are processing your request.</p></div></div>' },
  "ajax": {
    'type': 'GET',
    'url': '{{ url("gallery_list") }}',
    "data": function(d){
             d.searchdata = d.search.value
    }
  },
  searching: true,
  "iDisplayLength": 10,
  "columnDefs": [
  {
    "targets": 0,
    data: 'index',
  },
  {
    "targets": 1,
    orderable: false,
    "render": function ( data, type, row, meta ) {
      return '<p class="mb-0 customer-name">'+row.service_name+'</p>';
    }
  },
  {
    "targets": 2,
    orderable: false,
    "render": function ( data, type, row, meta ) {

    //  return' <div id="app-cover"><div class="toggle-button-cover"><div class="button-cover"><div class="button r" id="button-1"><input type="checkbox" data-banner_id='+row.id+' checked=true id="banner_status_id" name="banner_status_id" class="checkbox" value='+row.id+' /><div class="knobs"></div><div class="layer"></div> </div></div></div></div>';
    return '<img src="'+row.image+'" class="service-icon">';

  
    }
    // "'+row.status == 'active' ? 'active' : 'inactive'+'"
  },
 

  {
    "targets": 3,
    orderable: false,
    "render": function ( data, type, row, meta ) {

      return   '<div class="action"><a href="#"  class="edit gallery_edit" data-id='+row.id+'> <i class="bi bi-pencil-square"></i></a><a href="javascript:void(0)" data-id='+row.id+' class="view text-info gallery_view" type="button"> <i class="bi bi-eye-fill"></i></a><a href="#" class="delete" onclick="deleteOrder('+row.id+')"> <i class="bi bi-trash"></i></a></div>';

    }
  }
  ],
  rowId: 'id'
});
});

function deleteOrder(id) {

swal({
  title: "Are you sure?",
  text: "Confirm to delete this Gallery?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    var token = $('meta[name="csrf-token"]').attr("content");
    var formData = new FormData();
    formData.append("_token", "{{ csrf_token() }}");
    formData.append("id", id);
    $.ajax({
      url: "{{ url('gallery_delete','') }}"+"/"+id,
      data: formData,
      type: 'DELETE',
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (res) {
        if (res) {
          swal("Deleted!", "Your Gallery has been deleted.", "success");
          $('#galleryList').DataTable().ajax.reload();
        } else {
          swal("Gallery Delete Failed", "Please try again. :)", "error");
        }
      }
    });

  } else {
  swal("Cancelled", "Cancelled", "error");
  }
});
}
</script>
@endsection
