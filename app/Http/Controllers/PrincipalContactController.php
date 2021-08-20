<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrincipalContactRequest;
use App\PrincipalContact;
use Illuminate\Http\Request;

class PrincipalContactController extends Controller
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


    public function principalcontact($id){
        $output=PrincipalContact::where([
            'principal_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['name'] = $value->name;
                $nestedData['position'] = $value->position;
                $nestedData['contact_number'] = $value->contact_number;
                $nestedData['email_address'] = $value->email_address;
                          
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
    public function store(PrincipalContactRequest $request)
    {
        $request->user()->principalcontact()->create(
            $request->all()
        );
        return response()->json(['success'=>'New contact has been added.']);
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
        return response()->json(PrincipalContact::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrincipalContactRequest $request)
    {
        PrincipalContact::findOrFail($request->id)->update($request->all());
        
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
        PrincipalContact::find($id)->delete();
        return response()->json(['success'=>'Record has been deleted.']);
    }
}
