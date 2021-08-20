<?php

namespace App\Http\Controllers;

use App\CrewEducation;
use App\Http\Requests\CrewEducationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrewEducationController extends Controller
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

    public function education($id){
        $output=CrewEducation::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['course_degree'] = $value->course_degree;
                $nestedData['school_name'] = $value->school_name;
                $nestedData['attendance_date'] = $value->attendance_date;
                $nestedData['options'] = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                                          <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                $data[] = $nestedData;

            }
        }
        $json_data = array(

            "data"            => $data
            );

            return json_encode($json_data);
        // return response()->json();
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
    public function store(CrewEducationRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->id();
        CrewEducation::create($data);
        return response()->json(['success'=>'New education has been added.']);
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
        return response()->json(CrewEducation::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewEducationRequest $request)
    {
        $update=CrewEducation::find($request->id);
        $update->fill($request->all());
        $request['user_id']=auth()->id();
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
        $delete=CrewEducation::find($id);
        $delete->delete();
        return response()->json(['success'=>'Education record <strong> '.$delete->course_degree.'</strong> has been deleted.']);
    }
}
