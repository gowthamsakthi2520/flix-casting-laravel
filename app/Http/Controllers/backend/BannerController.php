<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('backend.banner.view');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.banner.add');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'banner_title' => 'required',
            'banner_images' => 'required',
            'banner_description' => 'required',
        ]);
        // [
        //    'banner_images.dimensions'=>'Image must be 1449 * 800 dimensions',    
        // ]
    
        // |mimes:jpeg,png,jpg,gif,svg,webpdimensions:width=1449,height=800

        try {
            $images = [];
            if ($request->hasFile('banner_images')) {
                $file=$request->file('banner_images');
                // foreach ($request->file('banner_images') as $file) {
                    $filename = time() . rand(1, 50) . '.' . $file->extension();
                    $file->move(public_path('banner_images'), $filename);
                    $images[] = 'banner_images/' . $filename;
                //}
            }
            $validate['banner_images'] = implode(',', $images);

            $banner = Banner::create($validate);
            $msg = "Banner Added Successfully";
            redirect('service')->with(['success' => $msg]);
             return response()->json(['success'=>true]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }


    }

    public function banner_lists(Request $request)
    {

        // try {

        $banner = Banner::select('*');
        $bannercount = Banner::select('*');

        if (isset($request->searchdata) && $request->searchdata != '') {
            $banner->where('banner_title', 'like', '%' . $request->searchdata . '%');
            $bannercount->where('banner_title', 'like', '%' . $request->searchdata . '%');
        }

        $totalcount = $bannercount->get();
        $totalcount = count($totalcount);

        $allemp = $banner->orderBy('id', 'desc')
            ->take($request->length)->skip($request->start)->get();

        $arr = array();
        $i = $request->start + 1;
        foreach ($allemp as $val) {
            $var['id'] = $val->id;
            $img = explode(',', $val->banner_images);

            $var['banner_title'] = (!empty($val->banner_title)) ? $val->banner_title : '';
            $var['banner_images'] = (!empty($val->banner_images)) ? $img : '';
            $var['banner_description'] = (!empty($val->banner_description)) ? $val->banner_description : '';
            $var['index'] = $i++;
            array_push($arr, $var);
        }

        $data['draw'] = $request->draw;
        $data['recordsTotal'] = $totalcount;
        $data['recordsFiltered'] = $totalcount;
        $data['data'] = $arr;

        return json_encode($data);

        // } catch (\Exception $e) {
        //     return back()->with('error',$e->getMessage())->withInput();
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $banner = Banner::find($id);
            return view('backend.banner.edit', compact('banner'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'banner_title' => 'required',
            'banner_images' => 'mimes:jpeg,png,jpg,gif,svg|dimensions:width=1449,height=800',
            'banner_description' => 'required',
        ],[
           'banner_images.dimensions'=>'Image must be 1449 * 800 dimensions',    
        ]);

        try {

        $banner = Banner::find($id);

        if ($request->banner_images != "") {
            $files = [];
            if ($request->hasFile('banner_images')) {
                foreach ($request->file('banner_images') as $file) {
                    $name = time() . rand(1, 50) . '.' . $file->extension();
                    $file->move(public_path('banner_images'), $name);
                    $files[] = 'banner_images/' . $name;
                }
            }
            $validate['banner_images'] = implode(',', $files);



            $old_images = explode(',', $banner->banner_images);
            foreach ($old_images as $new) {
                $remove = ltrim($new, 'banner_images/');
                if (File::exists(public_path('banner_images/' . $remove))) {
                    File::delete(public_path('banner_images/' . $remove));
                }
            }

        } else {
            $validate['banner_images'] = $banner->banner_images;
        }

        $banner_update = $banner->update($validate);
        $msg = "Banner Updated Successfully";
        redirect('service')->with(['success' => $msg]);
        return response()->json(['success'=>true]);

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $banner = Banner::find($id);
            $banner->delete();
            $msg = "Banner has been deleted successfully";
            return response()->json(['status' => true, 'Success' => $msg], 200);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}