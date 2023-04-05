<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\news_feature;
use Session;
class newsController extends Controller
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
        $data = news::orderBy('created_at','desc')->paginate(10); 
        return view('admin.news.index')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image',
            'publish_date'=>'required|date_format:Y-m-d',
            ]);

         $news = new news();
         $news->title = $request->title;
         $news->type = $request->type;
         $news->publish_date = $request->publish_date;
         $news->description = $request->description;
         $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
              $news->picture='images/news/'.$picuploadname;
              $request->image->move(public_path('images/news/'),$picuploadname);
         $news->save(); 
                return redirect('admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $news = news::findorfail($id);
        $media = news_feature::where('news_id',$news->id)->paginate(6);
        return view('admin.news.detail')->with(['media'=>$media,'news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = news::findorfail($id);
        return view('admin.news.edit')->with(['data'=>$data]);
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
        $news = news::findorfail($id);
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'publish_date'=>'required|date_format:Y-m-d',
            ]);
        if($request->image){
            
            $this->validate($request,[
            'image'=>'required|image',
            ]);
            
                unlink($news->picture);
                $news->title = $request->title;
                $news->type = $request->type;
                $news->publish_date = $request->publish_date;
                $news->description = $request->description;
                $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
                $news->picture='images/news/'.$picuploadname;
                $request->image->move(public_path('images/news/'),$picuploadname);
                $news->save();
        }
        else{
                $news->title = $request->title;
                $news->type = $request->type;
                $news->publish_date = $request->publish_date;
                $news->description = $request->description;    
                $news->save();
                return redirect('admin/news');    
      }
        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = news::findorfail($id);
            // first we delete the picture of news
                unlink($data->picture);    
                $result = $data->delete();
          return redirect('admin/news');
    }

}
