<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Subservices;
use App\Models\Gallery;
use App\Models\Videos;
use App\Models\Banner;

class IndexController extends Controller
{
    public function dashboard(Request $request){
        try{

            $services_get_count =Services::count() ;
            $sub_count =Subservices::count();
            $gallery_count = Gallery::count();
            $videos_count =Videos::count();
            $banner_count = Banner::count();

            // dd($services_get_count);
            return view('backend.dashboard',compact('services_get_count','sub_count','gallery_count','videos_count','banner_count'));
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
