<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Services;
class VideosController extends Controller
{
    public function index(Request $request){
    
        try{
            $services=Services::all();
            return view('backend.videos.index',['services'=>$services]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }



    public function store(Request $request){
        $validate=$request->validate([
            'service_id'=>'required',
            'youtube_link'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,webp|dimensions:width=420,height=313',
        ],[
           'image.dimensions'=>'Image must be 420 * 313 dimensions',    
        ]);
        try{
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('galleries'),$img_name);
            $validate['image']="galleries".'/'.$img_name;

            Videos::create($validate);
            $msg = "Videos added successfully";
            return redirect('videos')->with(['success' => $msg]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function edit(Request $request,$id){
        try{
            $videos=Videos::find($id);
           return response()->json(['videos'=>$videos]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function update(Request $request,$id){
        $validate=$request->validate([
            'service_id'=>'required',
            'youtube_link'=>'required',
            'image'=>'mimes:jpeg,png,jpg,webp|dimensions:width=420,height=313',
        ],[
           'image.dimensions'=>'Image must be 420 * 313 dimensions',    
        ]);
        try{
            $service = Videos::find($id);
            if(!empty($validate['image'])){
           
                $img_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('galleries'),$img_name);
                $validate['image']="galleries".'/'.$img_name;


            }
            $service->update($validate);
            $msg = "Videos updated successfully";
            return redirect('videos')->with(['success' => $msg]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function videos_list(Request $request){
        try {

            $service = Videos::select('*');
            $servicecount = Videos::select('*');

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
                $var['service'] = (!empty($val->services->service_name)) ? $val->services->service_name : '';
                $var['youtube_link'] =(!empty($val->youtube_link)) ? $val->youtube_link : '';
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
            $videos=Videos::find($id);
            $service_name=$videos->services->service_name;
            return response()->json(['videos'=>$videos,'service_name'=>$service_name]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function delete(Request $request,$id){
        try {
            $service=Videos::find($id);
            $service->delete();
            $msg = "Sub service deleted successfully";
            return response()->json(['status' => true ,'msg' => 'success'], 200);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
