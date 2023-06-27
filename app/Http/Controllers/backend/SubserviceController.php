<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subservices;
use App\Models\Services;
class SubserviceController extends Controller
{
    public function index(Request $request){
        try{
            $services=Services::all();
            return view('backend.subservice.index',['services'=>$services]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }



    public function store(Request $request){
        $validate=$request->validate([
            'service_id'=>'required',
            'subservice_name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,webp|dimensions:width=72,height=72',
        ],[
           'image.dimensions'=>'Image must be 72 * 72 dimensions',    
        ]);
        try{
            $img_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('subservices'),$img_name);
            $validate['image']="subservices".'/'.$img_name;
            Subservices::create($validate);
            $msg = "Sub service added successfully";
            redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function edit(Request $request,$id){
        try{
            $subservices=Subservices::find($id);
           return response()->json(['subservices'=>$subservices]);
        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function update(Request $request,$id){
        $validate=$request->validate([
            'service_id'=>'required',
            'subservice_name'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,png,jpg,webp|dimensions:width=72,height=72',
        ],[
           'image.dimensions'=>'Image must be 72 * 72 dimensions',    
        ]);
        try{
            $service = Subservices::find($id);
            
            if(!empty($validate['image'])){
           
                $img_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('subservices'),$img_name);
                $validate['image']="subservices".'/'.$img_name;

                // $image = $service->image;
                // $remove = ltrim($image,'services/');
    
                // if(File::exists(public_path('services/'.$remove))){
                //     File::delete(public_path('services/'.$remove));
                // }
            }
            $service->update($validate);
            $msg = "Sub service updated successfully";
             redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);

        } catch (\Exception $e) {
              return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function subservice_list(Request $request){
        try {

            $service = Subservices::select('*');
            $servicecount = Subservices::select('*');

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
                $var['description'] =(!empty($val->description)) ? $val->description : '';
                $var['service'] =(!empty($val->services->service_name)) ? $val->services->service_name : '';
                $var['subservice'] =(!empty($val->subservice_name)) ? $val->subservice_name : '';
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
            $subservice=Subservices::find($id);
            $service_name=$subservice->services->service_name;
            return response()->json(['subservice'=>$subservice,'service_name'=>$service_name]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function delete(Request $request,$id){
        try {
            $service=Subservices::find($id);
            $service->delete();
            $msg = "Sub service deleted successfully";
            redirect('service')->with(['success' => $msg]);
            return response()->json(['status' => true ,'msg' => 'success'], 200);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage())->withInput();
        }
    }
}
