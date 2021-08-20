<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryScaleDetailRequest;
use App\Repositories\SalaryScaleRepository;
use App\SalaryScaleDetail;
use App\Vessel;
use App\VesselSalaryScale;
use Illuminate\Http\Request;

class SalaryScaleDetailController extends Controller
{

    private $salaryScaleRepository;

    public function __construct(SalaryScaleRepository $salaryScaleRepository)
    {
        $this->salaryScaleRepository=$salaryScaleRepository;
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

    public function salaryscaledetail($id){
        $output=SalaryScaleDetail::where([
            'salary_scale_id' => $id
            ])->get();
            $data1 = SalaryScaleDetail::selectRaw('salary_scale_id,rank_id,SUM(monthly) as monthly,sum(daily) as daily')->where(['add_to_total'=>1, 'salary_scale_id' =>$id])
            ->groupBy(['rank_id','salary_scale_id'])->get();

            foreach($data1 as $alphabet => $collection) {
                    $s=new SalaryScaleDetail();
                    $s->salary_scale_id=$collection->salary_scale_id;
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
    public function store(SalaryScaleDetailRequest $request)
    {
        $data=$request->all();
        $data['add_to_total'] =$request->has('add_to_total') ? true : false;
        $result=$request->user()->salaryscaledetail()->create($data);
        $this->salaryScaleRepository->create($result,$request->principal_id);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(SalaryScaleDetail::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryScaleDetailRequest $request)
    {
        $update=SalaryScaleDetail::find($request->id);
        $update->fill($request->all());
        $update['add_to_total'] =$request->has('add_to_total') ? true : false;
        $update->save();
        $this->salaryScaleRepository->update($request->id);
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
        SalaryScaleDetail::find($id)->delete();
        return response()->json(['success'=>'Record has been deleted.']);

    }
}
