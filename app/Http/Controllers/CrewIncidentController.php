<?php

namespace App\Http\Controllers;

use App\CrewIncident;
use App\Http\Requests\CrewIncidentRequest;
use Illuminate\Http\Request;

class CrewIncidentController extends Controller
{

    public function crewincident($id){
        $output=CrewIncident::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['vessel'] = $value->vessel;
                $nestedData['rank'] = $value->rank;
                $nestedData['incident_date'] = $value->incident_date;
                $nestedData['repatriation_date'] = $value->repatriation_date;
                $nestedData['description'] = $value->description;
                $nestedData['incident_type'] = $value->incident_type;
                $nestedData['disability'] = $value->disability;
                $nestedData['pronounced_date'] = $value->pronounced_date;
                $nestedData['settled_date'] = $value->settled_date;
                $nestedData['status'] = $value->status;
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
    public function store(CrewIncidentRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->id();
        CrewIncident::create($data);
        return response()->json(['success'=>'New Incident has been added.']);
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
        return response()->json(CrewIncident::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewIncidentRequest $request)
    {
        $update=CrewIncident::find($request->id);
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
        $delete=CrewIncident::find($id);
        $delete->delete();
        return response()->json(['success'=>'Data deleted successfully.']);

    }
}
