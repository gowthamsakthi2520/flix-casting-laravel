<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[\App\Http\Controllers\frontend\IndexController::class,'index']);
Route::get('/services/{slug}',[\App\Http\Controllers\frontend\IndexController::class,'service']);
Route::get('/services-page',[\App\Http\Controllers\frontend\IndexController::class,'home_service_page'])->name('services_page');
Route::get('/audition-page',[\App\Http\Controllers\frontend\IndexController::class,'index_audition_page'])->name('audition_page');
Route::get('/Contact-page',[\App\Http\Controllers\frontend\IndexController::class,'index_contact_us'])->name('contact_page');




Route::middleware(['auth'])->group(function(){
Route::get('/dashboard',[\App\Http\Controllers\backend\IndexController::class,'dashboard']);

/* profile */
Route::get('/profile',[\App\Http\Controllers\frontend\IndexController::class,'profile'])->name('profile');
Route::post('/profile-update',[\App\Http\Controllers\frontend\IndexController::class,'update'])->name('profile-update');


/* services */
Route::get('/service',[\App\Http\Controllers\backend\ServiceController::class,'index']);
Route::get('/service_list',[\App\Http\Controllers\backend\ServiceController::class,'service_list']);
Route::get('/service_add',[\App\Http\Controllers\backend\ServiceController::class,'add']);
Route::post('/service_store',[\App\Http\Controllers\backend\ServiceController::class,'store']);
Route::get('/service_edit/{id}',[\App\Http\Controllers\backend\ServiceController::class,'edit']);
Route::post('/service_update/{id}',[\App\Http\Controllers\backend\ServiceController::class,'update']);
Route::get('/service_view/{id}',[\App\Http\Controllers\backend\ServiceController::class,'view']);
Route::delete('/service_delete/{id}',[\App\Http\Controllers\backend\ServiceController::class,'delete']);

/* sub services */
Route::get('/subservice',[\App\Http\Controllers\backend\SubserviceController::class,'index']);
Route::get('/subservice_list',[\App\Http\Controllers\backend\SubserviceController::class,'subservice_list']);
Route::post('/subservice_store',[\App\Http\Controllers\backend\SubserviceController::class,'store']);
Route::get('/subservice_edit/{id}',[\App\Http\Controllers\backend\SubserviceController::class,'edit']);
Route::post('/subservice_update/{id}',[\App\Http\Controllers\backend\SubserviceController::class,'update']);
Route::get('/subservice_view/{id}',[\App\Http\Controllers\backend\SubserviceController::class,'view']);
Route::delete('/subservice_delete/{id}',[\App\Http\Controllers\backend\SubserviceController::class,'delete']);

/* gallery */
Route::get('/gallery',[\App\Http\Controllers\backend\GalleryController::class,'index']);
Route::get('/gallery_list',[\App\Http\Controllers\backend\GalleryController::class,'gallery_list']);
Route::post('/gallery_store',[\App\Http\Controllers\backend\GalleryController::class,'store']);
Route::get('/gallery_edit/{id}',[\App\Http\Controllers\backend\GalleryController::class,'edit']);
Route::post('/gallery_update/{id}',[\App\Http\Controllers\backend\GalleryController::class,'update']);
Route::get('/gallery_view/{id}',[\App\Http\Controllers\backend\GalleryController::class,'view']);
Route::delete('/gallery_delete/{id}',[\App\Http\Controllers\backend\GalleryController::class,'delete']);

/*Banner*/
Route::resource('/banner',(App\Http\Controllers\backend\BannerController::class));
Route::get('/banner_lists',[\App\Http\Controllers\backend\BannerController::class,'banner_lists']);

/* videos */
Route::get('/videos',[\App\Http\Controllers\backend\VideosController::class,'index']);
Route::get('/videos_list',[\App\Http\Controllers\backend\VideosController::class,'videos_list']);
Route::post('/videos_store',[\App\Http\Controllers\backend\VideosController::class,'store']);
Route::get('/videos_edit/{id}',[\App\Http\Controllers\backend\VideosController::class,'edit']);
Route::post('/videos_update/{id}',[\App\Http\Controllers\backend\VideosController::class,'update']);
Route::get('/videos_view/{id}',[\App\Http\Controllers\backend\VideosController::class,'view']);
Route::delete('/videos_delete/{id}',[\App\Http\Controllers\backend\VideosController::class,'delete']);
});

