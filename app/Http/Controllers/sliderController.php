<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;

class sliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = slider::orderBy('created_at','desc')->paginate(10); 
        return view('admin.slider.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'required|image',
            ]);

         $slider = new slider();
         $slider->title = $request->title;
         $slider->sub_title = $request->sub_title;
         $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
              $slider->picture='images/slider/'.$picuploadname;
              $request->image->move(public_path('images/slider/'),$picuploadname);
         $slider->save(); 
                return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {   
    //     $data = slider::findorfail($id);
    //     return view('slider.detail')->with(['data'=>$data]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = slider::findorfail($id);
        // return view('admin.slider.edit')->with(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $slider = slider::findorfail($id);
    //     $this->validate($request,[
    //         'title'=>'required',
    //         'description'=>'required',
    //         'publish_date'=>'required|date_format:Y-m-d',
    //         ]);
    //     if($request->image){
            
    //         $this->validate($request,[
    //         'image'=>'required|image',
    //         ]);
            
    //             unlink($slider->picture);
    //             $slider->title = $request->title;
    //             $slider->publish_date = $request->publish_date;
    //             $slider->description = $request->description;
    //             $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
    //             $slider->picture='images/slider/'.$picuploadname;
    //             $request->image->move(public_path('images/slider/'),$picuploadname);
    //             $slider->save();
    //     }
    //     else{
    //             $slider->title = $request->title;
    //             $slider->publish_date = $request->publish_date;
    //             $slider->description = $request->description;    
    //             $slider->save();
    //             return redirect('admin/slider');    
    //   }
    //     return redirect('admin/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = slider::findorfail($id);
            // first we delete the picture of slider
                unlink($data->picture);    
                $result = $data->delete();
          return redirect('admin/slider');
    }
}
