<?php

namespace App\Http\Controllers;

use App\Models\Senf;
use App\Models\Department;
use Illuminate\Http\Request;

class SenfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senfs = Senf::all();
        return view('admin.senfs.index', compact('senfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.senfs.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $senf = new Senf;
        $senf->name = $request->name;
        $senf->department_id = $request->department;
        $senf->year = $request->year;
        $senf->semester = $request->semester;
        $senf->start_date = $request->start_date;
        $senf->end_date = $request->end_date;
        $senf->status = $request->status;
        if($request->is_active == 'on') $senf->is_active = 1;
        else $senf->is_active = 0;
        $senf->monthly_fee = $request->monthly_fee;
        $senf->save();
        return redirect(route('senfs.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Senf  $senf
     * @return \Illuminate\Http\Response
     */
    public function show(Senf $senf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Senf  $senf
     * @return \Illuminate\Http\Response
     */
    public function edit(Senf $senf)
    {

        $departments = Department::all();
        return view('admin.senfs.edit', compact('departments', 'senf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Senf  $senf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Senf $senf)
    {
        $senf->name = $request->name;
        $senf->department_id = $request->department;
        $senf->year = $request->year;
        $senf->semester = $request->semester;
        $senf->start_date = $request->start_date;
        $senf->end_date = $request->end_date;
        $senf->status = $request->status;
        if($request->is_active == 'on') $senf->is_active = 1;
        else $senf->is_active = 0;
        $senf->monthly_fee = $request->monthly_fee;
        $senf->update();
        return redirect(route('senfs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Senf  $senf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Senf $senf)
    {
        $senf->delete();
        return redirect()->back();
    }
}
