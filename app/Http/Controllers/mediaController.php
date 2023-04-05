<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\media;

class mediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 0){

        $this->validate($request,[
                'image'=>'required|image',
                ]); 

            $media = new media();
            $media->title = $request->title;
            $media->type = $request->type;
            $media->gallery_id = $request->gallery_id;
            $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
                $media->picture='images/gallery/'.$picuploadname;
                $request->image->move(public_path('images/gallery/'),$picuploadname);
            $media->save(); 
            return redirect('admin/gallery/'.$request->gallery_id);

        }
        elseif($request->type == 1){
                $this->validate($request,[
                    'image'=>'required|mimes:mp4,mov,ogg',
                    ]); 
            $media = new media();
            $media->title = $request->title;
            $media->type = $request->type;
            $media->gallery_id = $request->gallery_id;
            $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
                $media->picture='images/gallery/'.$picuploadname;
                $request->image->move(public_path('images/gallery/'),$picuploadname);
            $media->save(); 
            return redirect('admin/gallery/'.$request->gallery_id);

        }
        else{
           return redirect()->back(); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = media::findorfail($id);
         $gallery_id = $data->gallery_id;
            // first we delete the picture of project
                unlink($data->picture);    
                $result = $data->delete();
          return redirect('admin/gallery/'.$gallery_id);
    }
}
