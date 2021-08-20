<?php

namespace App\Http\Controllers;

use App\CrewAllottee;
use App\Http\Requests\CrewAllotteeRequest;
use Illuminate\Http\Request;

class CrewAllotteeController extends Controller
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

    public function getAllottee($id=0){
        return response()->json(CrewAllottee::select('id','account_name')->where('crew_id',$id)->orderBy('account_name','asc')->get());
    }

    public function allottee($id){
        $output=CrewAllottee::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['bank'] = $value->bank;
                $nestedData['branch'] = $value->branch;
                $nestedData['account_name'] = $value->account_name;
                $nestedData['relationship'] = $value->relationship;
                $nestedData['account_number'] = $value->account_number;
                $nestedData['allotment'] = $value->allotment;
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
    public function store(CrewAllotteeRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->id();
        CrewAllottee::create($data);
        return response()->json(['success'=>'New Allottee has been added.']);
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
        return response()->json(CrewAllottee::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewAllotteeRequest $request)
    {
        $update=CrewAllottee::find($request->id);
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
        $delete=CrewAllottee::find($id);
        $delete->delete();
        return response()->json(['success'=>'Allottee record <strong> '.$delete->account_name.'</strong> has been deleted.']);

    }
}
