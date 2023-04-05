<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\media;

class galleryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = gallery::paginate(10); 
        return view('admin.gallery.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $gallery = new gallery();
         $gallery->title = $request->title;
         $gallery->link = $request->link;
         $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
              $gallery->picture='images/gallery/'.$picuploadname;
              $request->image->move(public_path('images/gallery/'),$picuploadname);
         $gallery->save(); 
         return redirect('admin/gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $album = gallery::findorfail($id);
        $media = media::where('gallery_id',$album->id)->paginate(6);
        return view('admin.gallery.detail')->with(['media'=>$media,'album'=>$album]);
    }

    public function edit($id)
    {
        $data = gallery::findorfail($id);
        return view('admin.gallery.edit')->with(['data'=>$data]);
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
        $gallery = gallery::findorfail($id);
        $this->validate($request,[
            'title'=>'required',
            ]);
        if($request->image){
            
            $this->validate($request,[
            'image'=>'required|image',
            ]);
                unlink($gallery->picture);
                $gallery->title = $request->title;
                $gallery->link = $request->link;
                $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
                     $gallery->picture='images/gallery/'.$picuploadname;
                     $request->image->move(public_path('images/gallery/'),$picuploadname);
                $gallery->save();
        }
        else{
            $gallery->title = $request->title;
            $gallery->link = $request->link;
            $gallery->save();
            return redirect('admin/gallery');    
      }
      return redirect('admin/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = gallery::findorfail($id);
            // first we delete the picture of gallery
                unlink($data->picture);    
                $result = $data->delete();
          return redirect('admin/gallery');
    }
}
