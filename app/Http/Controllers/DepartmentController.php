<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use Session;
use Carbon\Carbon;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Department::all();
        return view('admin.departments.index')->with(['departments'=>$data]);
    }
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
        $faculties = Faculty::all();
        return view('admin.departments.create', compact('faculties'));
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
            'name'=>'required|string',
        ]);

        try {
            $department = new Department;
            $department->name = $request->name;
            $department->faculty_id = $request->faculty;
            $department->save();
            Session::flash('success','New department successfully Saved');
        } catch (Exception $e) {
            Session::flash('exception',$e->getMessage());
        }
        return redirect(route('departments.index'));
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
        // return $department;
     $department = Department::findorfail($id);
     $faculties = Faculty::all();
    
     return view('admin.departments.edit', compact('department', 'faculties'));
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
        $this->validate($request,[
            'name'=>'required|string',
        ]);

        try {
            $department = Department::findorfail($id);
            $department->name = $request->name;
            $department->save();
            Session::flash('success','department Data Updated');
        } catch (Exception $e) {
            Session::flash('exception',$e->getMessage());
        }
        return redirect(route('departments.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::findorfail($id);
        try {
            $data->delete();
            Session::flash('success','successfully Deleted');
        } catch (Exception $e) {
            Session::flash('exception',$e->getMessage());
        }
        return redirect()->back();
    }
}
