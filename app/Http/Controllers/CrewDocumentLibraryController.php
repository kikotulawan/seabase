<?php

namespace App\Http\Controllers;

use App\CrewDocumentLibrary;
use App\Http\Requests\CrewDocumentLibraryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CrewDocumentLibraryController extends Controller
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

    public function documentlibrary($id){
        $output=CrewDocumentLibrary::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['document_name'] = $value->document_name;
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
    public function store(CrewDocumentLibraryRequest $request)
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
        CrewDocumentLibrary::create($data);
        return response()->json(['success'=>'New Document Library has been added.']);
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
        return response()->json(CrewDocumentLibrary::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewDocumentLibraryRequest $request)
    {
        $update=CrewDocumentLibrary::find($request->id);
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

        $update=CrewDocumentLibrary::find($request->id)->with('crew')->first();

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
        $delete=CrewDocumentLibrary::find($id);
        $delete->delete();
        return response()->json(['success'=>'Document Library record <strong> '.$delete->document_name.'</strong> has been deleted.']);

    }
}
