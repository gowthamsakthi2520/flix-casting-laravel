<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Banner;
use Auth;
use App\Models\User;
class IndexController extends Controller
{
    public function index(Request $request){
        try{
            $services=Services::latest()->get();
            $banners = Banner::where('status','active')->get();

            return view('frontend.index',['services'=>$services,'banners'=>$banners]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }
    // profile blade calling function

    public function profile(Request $request){
        try{
            $user=Auth::user();
           $users = User::where('id',$user->id)->first();
            // dd($services_get_count);
            return view('backend.profile',compact('users'));
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    //profile update

    public function update(Request $request)
    {


        try {

            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'image' => 'mimes:jpeg,png,jpg,webp',
            ]);



            if (!empty($validate['image'])) {

                $img_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('services'), $img_name);
                $validate['image'] = "services" . '/' . $img_name;

                // $image = $service->image;
                // $remove = ltrim($image,'services/');

                // if(File::exists(public_path('services/'.$remove))){
                //     File::delete(public_path('services/'.$remove));
                // }
            }
            $user = Auth::user();
            User::where('id', $user->id)->update($validate);

            return;





        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }



     //service slug call in another page for view all button
    public function service(Request $request,$id){
        try{
            $service=Services::where('slug',$id)->first();
            $sub_services=$service->subservices;
            $galleries=$service->gallery;
            $videos=$service->videos;

            return view('frontend.services',['service'=>$service,'sub_services'=>$sub_services,'galleries'=>$galleries,'videos'=>$videos]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function home_service_page(){
        try{
            $banners = Banner::where('status','active')->get();
            $services=Services::latest()->get();
            return view('frontend.service_page',compact('banners','services'));
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }

    }

    public function index_audition_page(){

        try{
            $services = Services::latest()->get();
            $banners = Banner::where('status','active')->get();
            return view('frontend.audition_page',compact('banners','services'));
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function index_contact_us(){
        try{
            $banners = Banner::where('status','active')->get();
            $services = Services::latest()->get();
            return view('frontend.contact_us_page',compact('banners','services'));
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
