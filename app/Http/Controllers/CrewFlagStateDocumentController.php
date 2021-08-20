<?php

namespace App\Http\Controllers;

use App\CrewFlagStateDocument;
use App\Http\Requests\CrewFlagStateDocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CrewFlagStateDocumentController extends Controller
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

    public function flagstatedocument($id){
        $output=CrewFlagStateDocument::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                //$nestedData['license_id'] = $value->license_id;
                $nestedData['license'] = $value->license;
                $nestedData['flagstatedocument'] = $value->flagstatedocument;
                $nestedData['document_number'] = $value->document_number;
                $nestedData['issue_date'] = $value->issue_date;
                $nestedData['expiry_date'] = $value->expiry_date;
                $nestedData['issued_by'] = $value->issued_by;
                $nestedData['file_path'] = $value->file_path;
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
    public function store(CrewFlagStateDocumentRequest $request)
    {

        $data = $request->all();
        $data['user_id']=auth()->id();
        if ($request->has('file_path')) {

            $destination = 'public/uploads/' . $request->crew_no;
            $file= $request->file('file_path');
            $file_name = $file->getClientOriginalName();
            $path=$request->file_path->storeAs($destination,$file_name);
            $data['file_path']=$file_name;
        }

        CrewFlagStateDocument::create($data);
        return response()->json(['success'=>'New Flag State Document has been added.']);
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
        return response()->json(CrewFlagStateDocument::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewFlagStateDocumentRequest $request)
    {
        //CrewFlagStateDocument::findOrFail($request->id)->update($request->all());
        $update=CrewFlagStateDocument::find($request->id);
        $update->fill($request->all());
        $update['user_id']=auth()->id();

        if ($request->has('file_path')) {

            $destination = 'public/uploads/' . $request->crew_no;
            $file= $request->file('file_path');
            $file_name = $file->getClientOriginalName();
            $path=$request->file_path->storeAs($destination,$file_name);
            $update['file_path']=$file_name;
        }
        $update->save();
        return response()->json(['success'=>'Data updated successfully.']);
    }

    public function update_attachment(Request $request)
    {

        $update=CrewFlagStateDocument::find($request->id)->with('crew')->first();

        $file_path = 'public/uploads/' . $update->crew->crew_no .'/' .$update['file_path'];
        Storage::delete($file_path);
        $update['file_path']=null;
        $update->save();
        return response()->json(['success'=>'Attachment removed.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=CrewFlagStateDocument::find($id);
        $delete->delete();
        return response()->json(['success'=>'Flag State Document record <strong> '.$delete->flag_id.'</strong> has been deleted.']);

    }
}
