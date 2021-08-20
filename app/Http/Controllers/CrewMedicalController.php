<?php

namespace App\Http\Controllers;

use App\CrewMedical;
use App\Http\Requests\CrewMedicalRequest;
use App\Repositories\TravelDocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CrewMedicalController extends Controller
{

    private $travelRepository;
    public function __construct(TravelDocumentRepository $travelRepository)
    {
        $this->travelRepository=$travelRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMedical($id=0){
        return response()->json($this->travelRepository->medical($id));
    }
    public function index()
    {
        //
    }

    public function medical($id){
        $output=CrewMedical::where([
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                //$nestedData['license_id'] = $value->license_id;
                $nestedData['medicalcertificate'] = $value->medicalcertificate;
                $nestedData['clinic'] = $value->clinic;
                $nestedData['certificate_number'] = $value->certificate_number;
                $nestedData['issue_date'] = $value->issue_date;
                $nestedData['expiry_date'] = $value->expiry_date;
                $nestedData['remarks'] = $value->remarks;
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
    public function store(CrewMedicalRequest $request)
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
        CrewMedical::create($data);
        //$request->user()->crewmedical()->create($data);
        return response()->json(['success'=>'New Medical has been added.']);

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
        return response()->json(CrewMedical::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewMedicalRequest $request)
    {
        $update=CrewMedical::find($request->id);
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

        $update=CrewMedical::find($request->id)->with('crew')->first();

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
        $delete=CrewMedical::find($id);
        $delete->delete();
        return response()->json(['success'=>'Medical record <strong> '.$delete->certificate_number.'</strong> has been deleted.']);

    }
}
