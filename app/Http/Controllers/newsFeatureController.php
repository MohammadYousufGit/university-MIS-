<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news_feature;

class newsFeatureController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.project.create');
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
            'news_id'=>'required',
            'image'=>'required',
            ]);

            $index = 0;
            foreach ($request->image as $row){
                $feature = new news_feature();
                $feature->news_id = $request->news_id;
                $picuploadname = $index++.time().'.'.$row->getClientOriginalExtension();
                $feature->picture = 'images/project/'.$picuploadname;
                $row->move(public_path('images/project/'),$picuploadname);
                $feature->save();
            }
            return redirect('admin/news/'.$request->news_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $data = project::findorfail($id);
    //     return view('project.detail')->with(['data'=>$data]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = project::findorfail($id);
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'sdate'=>'required|date_format:Y-m-d',
            ]);
        if($request->image){

            $this->validate($request,[
            'image'=>'required|image',
            ]);

                unlink($project->picture);
                $project->title = $request->title;
                $project->start_date = $request->sdate;
                $project->end_date = $request->edate;
                $project->location = $request->location;
                $project->description = $request->description;
                $picuploadname = time().'.'.$request->image->getClientOriginalExtension();
                     $project->picture='images/project/'.$picuploadname;
                     $request->image->move(public_path('images/project/'),$picuploadname);
                $project->save();
        }
        else{
            $project->title = $request->title;
            $project->start_date = $request->sdate;
            $project->end_date = $request->edate;
            $project->description = $request->description;
            $project->location = $request->location;
            $project->save();
            return redirect('admin/project');
      }
      return redirect('admin/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = project_feature::findorfail($id);
            // first we delete the picture of project
            $id = $data->project_id;
            unlink($data->picture);
                $result = $data->delete();
          return redirect('admin/project/'.$id);
    }
}
