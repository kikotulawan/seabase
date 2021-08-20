<?php

namespace App\Http\Controllers;

use App\CrewOfficeHistory;
use App\Http\Requests\CrewOfficeHistoryRequest;
use Illuminate\Http\Request;

class CrewOfficeHistoryController extends Controller
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


    public function officehistory($id){
        $output=CrewOfficeHistory::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['remarks'] = $value->remarks;
                $nestedData['created_date'] = $value->created_at->toDateString();
                $nestedData['created_time'] = $value->created_at->toTimeString();
                $nestedData['options'] = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                                          <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                $data[] = $nestedData;

            }
        }
        $json_data = array(
           "data"  => $data
        );

        return json_encode($json_data);

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
    public function store(CrewOfficeHistoryRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->id();
        CrewOfficeHistory::create($data);
        return response()->json(['success'=>'New record has been added.']);
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
        return response()->json(CrewOfficeHistory::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewOfficeHistoryRequest $request)
    {
        $update=CrewOfficeHistory::find($request->id);
        $update->fill($request->all());
        $update['user_id']=auth()->id();
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
        $delete=CrewOfficeHistory::find($id);
        $delete->delete();
        return response()->json(['success'=>'Record  has been deleted.']);

    }
}
