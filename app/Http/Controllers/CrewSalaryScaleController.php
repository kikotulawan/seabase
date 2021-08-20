<?php

namespace App\Http\Controllers;

use App\CrewSalaryScale;
use App\Http\Requests\CrewSalaryScaleRequest;
use Illuminate\Http\Request;

class CrewSalaryScaleController extends Controller
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
    public function store(CrewSalaryScaleRequest $request)
    {
        $data=$request->all();
        $data['add_to_total'] =$request->has('add_to_total') ? true : false;
        CrewSalaryScale::create($data);

        return response()->json(['success'=>'New Salary Detail has been added.']);
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
    public function crewsalaryscale($id){
        $output=CrewSalaryScale::where([
            'crew_id' => $id
            ])->get();
            $data1 = CrewSalaryScale::selectRaw('rank_id,SUM(monthly) as monthly,sum(daily) as daily')->where(['add_to_total'=> 1,'crew_id' =>$id])
            ->groupBy(['rank_id'])->get();

            foreach($data1 as $alphabet => $collection) {
                    $s=new CrewSalaryScale();
                    $s->vessel_salay_scale_id=$collection->vessel_salay_scale_id;
                    $s->rank_id=$collection->rank_id;
                    $s->monthly=$collection->monthly;
                    $s->daily=$collection->daily;
                    $s->description='Total';
                    $s->add_to_total=0.1;
                    $output->push($s);
              }
        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['description'] = $value->description;
                $nestedData['rank'] = $value->rank;
                $nestedData['monthly'] = $value->monthly;
                $nestedData['daily'] = $value->daily;
                $nestedData['percentage'] = $value->percentage;
                $nestedData['days'] = $value->days;
                $nestedData['remarks'] = $value->remarks;
                $nestedData['add_to_total'] = $value->add_to_total;
                if($value->add_to_total!=0.1){
                    $nestedData['options'] = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                    <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(CrewSalaryScale::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewSalaryScaleRequest $request)
    {
        $update=CrewSalaryScale::find($request->id);
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
        CrewSalaryScale::find($id)->delete();
        return response()->json(['success'=>'Record has been deleted.']);
    }
}
