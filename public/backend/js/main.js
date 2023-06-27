
$(function() {
	"use strict";


// app dropdown
new PerfectScrollbar(".app-container")
new PerfectScrollbar(".header-notifications-list")


$(".sidebar-close").on("click", function() {
	$("body").removeClass("toggled")
})



$(".dark-mode span").click(function () {
	$(this).text(function(i, v){
	   return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
	})
});



$(function() {
	$("#menu").metisMenu()
})


$(".btn-toggle-menu").click(function() {
	$("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
		$("body").addClass("sidebar-hovered")
	}, function() {
		$("body").removeClass("sidebar-hovered")
	}))
})





$(function() {
	for (var e = window.location, o = $(".sidebar-wrapper .metismenu li a").filter(function() {
			return this.href == e
		}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
}),







// email 

$(".email-toggle-btn").on("click", function() {
	$(".email-wrapper").toggleClass("email-toggled")
}), $(".email-toggle-btn-mobile").on("click", function() {
	$(".email-wrapper").removeClass("email-toggled")
}), $(".compose-mail-btn").on("click", function() {
	$(".compose-mail-popup").show()
}), $(".compose-mail-close").on("click", function() {
	$(".compose-mail-popup").hide()
})


// chat 

$(".chat-toggle-btn").on("click", function() {
	$(".chat-wrapper").toggleClass("chat-toggled")
}), $(".chat-toggle-btn-mobile").on("click", function() {
	$(".chat-wrapper").removeClass("chat-toggled")
})




// switcher 

$(document).ready(function(){
	$("html").attr("data-bs-theme", "semi-dark")
  });





});


$('#service_form').submit(function(e){
	e.preventDefault();
	var big_description=CKEDITOR.instances['big_description'].getData();
	$('#big_description').val(big_description);
	var url=$('#url').val();
	var form = $('#service_form')[0];
	var formData = new FormData(form);
	var redirect=$('meta[name="base_url"]').attr('content')+'/service';
	$('.btn-primary').attr('disabled',true);
	$.ajax({
		url: url,
		type:'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(data) {
		    $('.btn-primary').attr('disabled',true);
			window.location.href=redirect;
		},error: function (xhr) {
$('.btn-primary').attr('disabled',false);
			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})


$('#gallery_form').submit(function(e){
	e.preventDefault();
	var url=$('#url').val();
	var form = $('#gallery_form')[0];
	var formData = new FormData(form);
	var redirect=$('meta[name="base_url"]').attr('content')+'/gallery';
	$('.btn-primary').attr('disabled',true);
	$.ajax({
		url: url,
		type:'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(data) {
		    $('.btn-primary').attr('disabled',false);
			window.location.href=redirect;
		},error: function (xhr) {
$('.btn-primary').attr('disabled',false);
			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})

$('#videos_form').submit(function(e){
	e.preventDefault();
	var url=$('#url').val();
	var form = $('#videos_form')[0];
	var formData = new FormData(form);
	var redirect=$('meta[name="base_url"]').attr('content')+'/videos';
	$('.btn-primary').attr('disabled',true);
	$.ajax({
		url: url,
		type:'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(data) {
		    $('.btn-primary').attr('disabled',false);
			window.location.href=redirect;
		},error: function (xhr) {
$('.btn-primary').attr('disabled',false);
			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})


$(document).on("click",'.service_view',function(){
	var id=$(this).data('id');
	var url=$('meta[name="base_url"]').attr('content')+'/service_view/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#service_popup').modal('show');
			var html='';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Service name</label>';
			html+='<p>'+data.service.service_name+'</p>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Small description</label>';
			html+='<p>'+data.service.service_description+'</p>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Big description</label>';
			html+='<span>'+data.service.big_description+'</span>';
			$('.service_content').html(html);
			console.log(data);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})


$(document).on("click",'.subservice_view',function(){
	var id=$(this).data('id');
	var url=$('meta[name="base_url"]').attr('content')+'/subservice_view/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#subservice_view').modal('show');
			var html='';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Icon</label><br>';
			html+='<img class="service-icon" src='+data.subservice.image+' width=200 height=100></img><br>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Description</label>';
			html+='<p>'+data.subservice.description+'</p>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Main service</label>';
			html+='<p>'+data.service_name+'</p>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Sub service</label>';
			html+='<p>'+data.subservice.subservice_name+'</p>';
			$('.subservice_content').html(html);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})


$(document).on("click",'.gallery_view',function(){
	var id=$(this).data('id');
	var url=$('meta[name="base_url"]').attr('content')+'/gallery_view/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#gallery_view').modal('show');
			var html='';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Gallery</label><br>';
			html+='<img class="service-icon" src='+data.gallery.image+' width=200 height=100></img><br>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Main service</label>';
			html+='<p>'+data.service_name+'</p>';
			$('.gallery_content').html(html);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})


$(document).on("click",'.videos_view',function(){
	var id=$(this).data('id');

	var url=$('meta[name="base_url"]').attr('content')+'/videos_view/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#videos_view').modal('show');
			var html='';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Service name</label><br>';
			html+='<p>'+data.service_name+'</p><br>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Image</label><br>';
			html+='<img class="service-icon" src='+data.videos.image+' width=200 height=100></img><br>';
			html+='<label class="form-label pt-3 fw-bold" for="customFile">Youtube Link</label><br>';
			html+='<a href='+data.videos.youtube_link+'>'+data.videos.youtube_link+'</a>';
			$('.videos_content').html(html);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})

$('#subservice_form').submit(function(e){
	e.preventDefault();
	var url=$('#url').val();
	var form = $('#subservice_form')[0];
	var formData = new FormData(form);
	var redirect=$('meta[name="base_url"]').attr('content')+'/subservice';
	$('.btn-primary').attr('disabled',true);
	$.ajax({
		url: url,
		type:'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(data) {
		    $('.btn-primary').attr('disabled',false);
			window.location.href=redirect;
		},error: function (xhr) {
$('.btn-primary').attr('disabled',false);
			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
})

$(document).on("click",".subservice_add",function(e){
	$('.input').val('');
	$('.user_err').html('');
	var url=$('meta[name="base_url"]').attr('content')+'/subservice_store';
	$('#url').val(url);
	$('.edit_img').css('display','none');
	$('.modal_button').html('Submit');
	$('.modal_title').html('Add');
})

$(document).on("click",".subservice_edit",function(e){
	e.preventDefault();
	var id=$(this).data('id');
	$('.user_err').html('');
	$('.modal_button').html('Update');
	$('#url').val('subservice_update');
	var service_url=$('meta[name="base_url"]').attr('content')+'/subservice_update/'+id;
	$('#url').val(service_url);
	$('.modal_title').html('Edit');
	var url=$('meta[name="base_url"]').attr('content')+'/subservice_edit/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#subservice_modal').modal('show');
			$('#service_id').val(data.subservices.service_id);
			$('#subservice_name').val(data.subservices.subservice_name);
			$('#description').val(data.subservices.description);
			$('.edit_img').css('display','block');
			$('.edit_img').attr('src',data.subservices.image);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});

})


$(document).on("click",".videos_add",function(e){
	$('.input').val('');
	$('.user_err').html('');
	var url=$('meta[name="base_url"]').attr('content')+'/videos_store';
	$('#url').val(url);
	$('.edit_img').css('display','none');
	$('.modal_button').html('Submit');
	$('.modal_title').html('Add');
})

$(document).on("click",".videos_edit",function(e){
	e.preventDefault();
	var id=$(this).data('id');
	$('.user_err').html('');
	$('.modal_button').html('Update');
	$('#url').val('subservice_update');
	var service_url=$('meta[name="base_url"]').attr('content')+'/videos_update/'+id;
	$('#url').val(service_url);
	$('.modal_title').html('Edit');
	var url=$('meta[name="base_url"]').attr('content')+'/videos_edit/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#subservice_modal').modal('show');
			$('#service_id').val(data.videos.service_id);
			$('#youtube_link').val(data.videos.youtube_link);
			$('.edit_img').css('display','block');
			$('.edit_img').attr('src',data.videos.image);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});

})

$(document).on("click",".gallery_add",function(e){
	$('.input').val('');
	$('.user_err').html('');
	var url=$('meta[name="base_url"]').attr('content')+'/gallery_store';
	$('#url').val(url);
	$('.edit_img').css('display','none');
	$('.modal_button').html('Submit');
	$('.modal_title').html('Add');
})

$(document).on("click",".gallery_edit",function(e){
	e.preventDefault();
	var id=$(this).data('id');
	$('#gallery_modal').modal('show');
	$('.user_err').html('');
	$('.modal_button').html('Update');
	$('#url').val('gallery_update');
	var service_url=$('meta[name="base_url"]').attr('content')+'/gallery_update/'+id;
	$('#url').val(service_url);
	$('.modal_title').html('Edit');
	var url=$('meta[name="base_url"]').attr('content')+'/gallery_edit/'+id;
	$.ajax({
		url: url,
		type:'GET',
		success: function(data) {
			$('#subservice_modal').modal('show');
			$('#service_id').val(data.subservices.service_id);
			$('#subservice_name').val(data.subservices.subservice_name);
			$('#description').val(data.subservices.description);
			$('.edit_img').css('display','block');
			$('.edit_img').attr('src',data.subservices.image);
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});

})

// add banners

$('#add_banners').submit(function(e){
   e.preventDefault();
   var form = $('#add_banners')[0];
   var url = $('#url').val();
   var redirect = $('meta[name="base_url"]').attr('content')+'/banner';
   var formData = new FormData(form);
   var token = $('meta[name="csrf-token"]').attr('content');
   formData.append('_token',token);
   	$('.btn-primary').attr('disabled',true);
   $.ajax({
	url:url,
	method:'POST',
	processData: false,
	contentType: false,
	data: formData,
	success:function(data){
		$('#add_banners')[0].reset();
			$('.btn-primary').attr('disabled',false);
		window.location.href=redirect;
	},
	error:function(xhr){
	    	$('.btn-primary').attr('disabled',false);
		$('.err').html('');
		$.each(xhr.responseJSON.errors, function(key,value){
			$('.'+key).append('<div class="text-danger err">'+value+'</div>');
		});
	}
   });
});

//update banners

$('#update_banners').submit(function(e){
	e.preventDefault();
	var form = $('#update_banners')[0];
	var token = $('meta[name="csrf-token"]').attr('content');
	var url = $('#url').val();
	var redirect = $('meta[name="base_url"]').attr('content')+'/banner';
	var id = $('#banner_id').val();
	var formData = new FormData(form);
	formData.append('_token',token);
		$('.btn-primary').attr('disabled',false);
    $.ajax({
		url:url,
		method:'POST',
		contentType:false,
		processData:false,
		data:formData,
		success:function(data){
		    	$('.btn-primary').attr('disabled',false);
		   window.location.href = redirect;
		},
		error:function(xhr){
		    	$('.btn-primary').attr('disabled',false);
			$('.err').html('');
			$.each(xhr.responseJSON.errors,function(key,value){
				$('.'+key).append('<div class="text-danger err">'+value+'</div>');
			});
		}
	});
});

//profile update

$('#profile_form').submit(function(e){
	e.preventDefault();
	var url=$('#url').val();
	var form = $('#profile_form')[0];
	var formData = new FormData(form);
	var redirect=$('meta[name="base_url"]').attr('content')+'/profile';
	console.log($('#profile_form')[0]);
	$.ajax({
		url: url,
		type:'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(data) {
			 window.location.href=redirect;
		
		},error: function (xhr) {

			$('.user_err').html('');
			$.each(xhr.responseJSON.errors, function(key,value) {
			  $('.'+key).append('<div class="text-danger user_err">'+value+'</div');
		  }); 
		 },
	});
});