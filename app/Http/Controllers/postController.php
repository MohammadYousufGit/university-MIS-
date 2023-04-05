<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;


class postController extends Controller
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
        dd("reached");
        $data = post::all(); 
        return view('admin.post.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $post = new post();
         $post->title = $request->title;
         $post->description = $request->description;
         $post->url = $request->url;
         $post->slug = str_replace(' ','-',strtolower($request->title));
         $post->save();
         return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $data = post::where('slug',$slug);
        return view('postdetail')->with(['data'=>$data]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = post::findorfail($id);
        return view('admin.post.edit')->with(['data'=>$data]);
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
        $post = post::findorfail($id);

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'close_date'=>'required',
            ]);

            $post->title = $request->title;
            $post->location = $request->location;
            $post->description = $request->description;
            $post->aslug= $request->start_date;
            $post->close_date = $request->close_date;
            $post->save();
            return redirect('admin/post');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = post::findorfail($id);
            // first we delete the picture of post
                $result = $data->delete();
          return redirect('admin/post');
    }
}
