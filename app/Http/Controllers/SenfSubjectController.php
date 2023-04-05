<?php

namespace App\Http\Controllers;

use App\Models\SenfSubject;
use Illuminate\Http\Request;

class SenfSubjectController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenfSubject  $senfSubject
     * @return \Illuminate\Http\Response
     */
    public function show(SenfSubject $senfSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenfSubject  $senfSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(SenfSubject $senfSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SenfSubject  $senfSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SenfSubject $senfSubject)
    {
        $senfSubject->credit = $request->credit;
        $senfSubject->teacher_id = $request->teacher;
        $senfSubject->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenfSubject  $senfSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenfSubject $senfSubject)
    {
        
        $senfSubject->delete();
        return redirect()->back();
    }
}
