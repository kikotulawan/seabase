<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryScaleRequest;
use App\SalaryScale;
use App\SalaryScaleDetail;
use Illuminate\Http\Request;


class SalaryScaleController extends Controller
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

    public function salaryscale($id){
        $output=SalaryScale::where([
            'principal_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['salary_name'] = $value->salary_name;
                $nestedData['active'] = $value->active;

                $nestedData['options'] = "<a href='".route('salaryscales.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='View' class='btn btn-secondary far fa-eye'></a>
                            <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryScaleRequest $request)
    {
        $data=$request->all();

        $data['active']=$request->has('active') ? true : false;

        $request->user()->salaryscale()->create($data);
        return response()->json(['success'=>'New Salary has been added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary_scale=SalaryScale::find($id);
        $salaryscaledetails=SalaryScaleDetail::where('salary_scale_id',$id)->get();

        $data1 = SalaryScaleDetail::selectRaw('salary_scale_id,rank_id,SUM(monthly) as monthly,sum(daily) as daily')->where('add_to_total',1)
        ->groupBy(['rank_id','salary_scale_id'])->get();

        foreach($data1 as $alphabet => $collection) {
                $s=new SalaryScaleDetail();
                $s->salary_scale_id=$collection->salary_scale_id;
                $s->rank_id=$collection->rank_id;
                $s->monthly=$collection->monthly;
                $s->daily=$collection->daily;
                $s->description='Total';
                $s->add_to_total=2;
                $salaryscaledetails->push($s);
          }
        //dd($salaryscaledetails);
        return view('salaryscales.show',['salary_scale' => $salary_scale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(SalaryScale::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryScaleRequest $request)
    {
        $data=$request->all();
        $data['active']=$request->has('active') ? true : false;
        SalaryScale::findOrFail($request->id)->update($data);

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
        SalaryScale::find($id)->delete();
        return response()->json(['success'=>'Record has been deleted.']);

    }
}
