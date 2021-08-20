<?php

namespace App\Http\Controllers;

use App\CrewChildrenBenificiary;
use App\Http\Requests\CrewChildrenBenificiaryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrewChildrenBenificiaryController extends Controller
{

    public function getBeneficiary($id=0){
        return response()->json(CrewChildrenBenificiary::select('id','first_name','last_name','relationship')
                        ->where('crew_id',$id)
                        ->where('type','B')
                        ->orderBy('last_name','asc')->get());
    }
    public function beneficiary($id){
        $output=CrewChildrenBenificiary::where([
            'type' => 'B',
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['first_name'] = $value->first_name;
                $nestedData['last_name'] = $value->last_name;
                $nestedData['relationship'] = $value->relationship;
                $nestedData['gender'] = $value->gender;
                $nestedData['birth_date'] = $value->birth_date;
                $nestedData['age'] = Carbon::parse($value->birth_date)->age;
                $nestedData['address'] = $value->address;
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

    public function children($id){
        $output=CrewChildrenBenificiary::where([
            'type' => 'C',
            'crew_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['first_name'] = $value->first_name;
                $nestedData['last_name'] = $value->last_name;
                $nestedData['relationship'] = $value->relationship;
                $nestedData['gender'] = $value->gender;
                $nestedData['birth_date'] = $value->birth_date;
                $nestedData['birth_place'] = $value->birth_place;
                $nestedData['age'] = Carbon::parse($value->birth_date)->age;;
                $nestedData['address'] = $value->address;
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

    public function store(CrewChildrenBenificiaryRequest $request)
    {
        $request->user()->crewchildrenbenificiary()->create(
            $request->all()
        );
        return response()->json(['success'=>'Data saved successfully.']);
    }

    public function edit($id)
    {
        return response()->json(CrewChildrenBenificiary::find($id));
    }

    public function update(CrewChildrenBenificiaryRequest $request)
    {
        CrewChildrenBenificiary::findOrFail($request->id)->update($request->all());

        return response()->json(['success'=>'Data updated successfully.']);
    }

    public function destroy($id)
    {
        CrewChildrenBenificiary::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }

}
