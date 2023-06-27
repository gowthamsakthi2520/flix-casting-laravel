<?php

namespace App\Http\Controllers\backend;
use Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Session;
class ServiceController extends Controller
{
    public function index(Request $request){

        try{
            
            return view('backend.service.index')->with(['success' => "Updated"]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function add(Request $request){
        try{

            return view('backend.service.add');
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function store(Request $request){
        $validate=$request->validate([
            'service_name'=>'required',
            'service_description'=>'required',
            'big_description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,webp|dimensions:width=1440,height=457',
        ],[
           'image.dimensions'=>'Image must be 1440 * 457 dimensions',    
        ]);
        try{
            $slug=Str::slug($request->service_name);
            $slug_count=Services::where('slug',$slug)->count();
            if($slug_count>0){
                $slug .=time().'-'.$slug;
            }
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('services'),$img_name);
            $validate['image']="services".'/'.$img_name;
            $validate['slug']=$slug;
            Services::create($validate);
            $msg = "Service added successfully";
            redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function edit(Request $request,$id){
        try{
            $service=Services::find($id);
            // dd(var_dump($service->big_description));
            return view('backend.service.edit',['service'=>$service]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function update(Request $request,$id){
        $validate=$request->validate([
            'service_name'=>'required',
            'service_description'=>'required',
            'big_description'=>'required',
            'image'=>'mimes:jpeg,png,jpg,webp|dimensions:width=1440,height=457',
        ],[
           'image.dimensions'=>'Image must be 1440 * 457 dimensions',    
        ]);
        try{
            $service = Services::find($id);
            
            if(!empty($validate['image'])){
           
                $img_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('services'),$img_name);
                $validate['image']="services".'/'.$img_name;

                // $image = $service->image;
                // $remove = ltrim($image,'services/');
    
                // if(File::exists(public_path('services/'.$remove))){
                //     File::delete(public_path('services/'.$remove));
                // }
            }
            $service->update($validate);
            $msg = "Service updated successfully";
            redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function service_list(Request $request){
        try {

            $service = Services::select('*');
            $servicecount = Services::select('*');

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
                $var['service_name'] = (!empty($val->service_name)) ? $val->service_name : '';
                $var['service_description'] =(!empty($val->service_description)) ? $val->service_description : '';
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
            $service=Services::find($id);
            return response()->json(['service'=>$service]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function delete(Request $request,$id){
        try {
            $service=Services::find($id);
            $service->delete();
            $msg = "Service deleted successfully";
            redirect('service')->with(['success' => $msg]);
            return response()->json(['status' => true ,'msg' => 'success'], 200);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
