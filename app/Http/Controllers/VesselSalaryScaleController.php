<?php

namespace App\Http\Controllers;

use App\Http\Requests\VesselSalaryScaleRequest;
use App\VesselSalaryScale;
use Illuminate\Http\Request;

class VesselSalaryScaleController extends Controller
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
    public function store(VesselSalaryScaleRequest $request)
    {

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
        return response()->json(VesselSalaryScale::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VesselSalaryScaleRequest $request)
    {
        $update=VesselSalaryScale::find($request->id);
        $update->fill($request->all());
        $update['add_to_total'] =$request->has('add_to_total') ? true : false;
        $update->save();
        return response()->json(['success'=>'Data updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VesselSalaryScale::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
