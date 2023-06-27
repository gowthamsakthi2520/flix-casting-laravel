<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Services;
class GalleryController extends Controller
{
    public function index(Request $request){
    
        try{
            $services=Services::all();
            return view('backend.gallery.index',['services'=>$services]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }



    public function store(Request $request){
        $validate=$request->validate([
            'service_id'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,webp|dimensions:width=354,height=259',
        ],[
           'image.dimensions'=>'Image must be 354 * 259 dimensions',    
        ]);
        try{
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('galleries'),$img_name);
            $validate['image']="galleries".'/'.$img_name;
            Gallery::create($validate);
            $msg = "Gallery added successfully";
            redirect('service')->with(['success' => $msg]);
            return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function edit(Request $request,$id){
        try{
            $subservices=Gallery::find($id);
           return response()->json(['subservices'=>$subservices]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function update(Request $request,$id){
        $validate=$request->validate([
            'service_id'=>'required',
            'image'=>'mimes:jpeg,png,jpg,webp|dimensions:width=354,height=259',
        ],[
           'image.dimensions'=>'Image must be 354 * 259 dimensions',    
        ]);
        try{
            $service = Gallery::find($id);
            
            if(!empty($validate['image'])){
           
                $img_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('galleries'),$img_name);
                $validate['image']="galleries".'/'.$img_name;

                // $image = $service->image;
                // $remove = ltrim($image,'services/');
    
                // if(File::exists(public_path('services/'.$remove))){
                //     File::delete(public_path('services/'.$remove));
                // }
            }
            $service->update($validate);
            $msg = "Gallery updated successfully";
             redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function gallery_list(Request $request){
        try {

            $service = Gallery::select('*');
            $servicecount = Gallery::select('*');

            if (isset($request->searchdata) && $request->searchdata != '') {
                $service->where('service_name', 'like', '%' . $request->searchdata . '%');
                $servicecount->where('service_name', 'like', '%' . $request->searchdata . '%');
            }

            $totalcount = $servicecount->get();
            $totalcount = count($totalcount);

            $allemp = $service->orderBy('id', 'desc')
                ->take($request->length)->skip($request->start)->get();

            $arr = array();
            $i = $request->start + 1;
            foreach ($allemp as $val) {
                $var['id'] = $val->id;
                $var['image'] = (!empty($val->image)) ? $val->image : '';
                $var['service_name'] =(!empty($val->services->service_name)) ? $val->services->service_name : '';
                $var['index'] = $i++;
                array_push($arr, $var);
            }

            $data['draw'] = $request->draw;
            $data['recordsTotal'] = $totalcount;
            $data['recordsFiltered'] = $totalcount;
            $data['data'] = $arr;

            return json_encode($data);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function view(Request $request,$id){
        try {
            $galleries=Gallery::find($id);
            $service_name=$galleries->services->service_name;
            return response()->json(['gallery'=>$galleries,'service_name'=>$service_name]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function delete(Request $request,$id){
        try {
            $service=Gallery::find($id);
            $service->delete();
            $msg = "Gallery deleted successfully";
            redirect('service')->with(['success' => $msg]);
            return response()->json(['status' => true ,'msg' => 'success'], 200);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
