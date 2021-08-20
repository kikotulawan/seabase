<?php

namespace App\Repositories;

use App\SalaryScale;
use App\SalaryScaleDetail;
use App\Vessel;
use App\VesselSalaryScale;

class SalaryScaleRepository
{
    private $crewRepository;

    public function __construct(CrewRepository $crewRepository)
    {
        $this->crewRepository=$crewRepository;
    }

    public function create($data,$principal_id){

        $vessel=Vessel::where('principal_id',$principal_id)->get();

        $vessels = [];
        foreach ($vessel as $v) {

            $vessels[] =new VesselSalaryScale([
                'vessel_id' => $v->id,
                'salary_scale_detail_id' => $data['id'],
                'rank_id' => $data['rank_id'],
                'description' => $data['description'],
                'monthly' => $data['monthly'],
                'daily' => $v->flag_id==9 ? (($data['monthly'])*12/365) : (($data['monthly'])*12/360),
                'percentage' => $data['percentage'],
                'days' => $data['days'],
                'remarks' => $data['remarks'],
                'add_to_total' => $data['add_to_total']
            ]);
        }
        $data->vesselsalaryscale()->saveMany($vessels);

    }

    public function update($id){
        $salary_scale_detail=SalaryScaleDetail::find($id);

        $values=array('rank_id'=> $salary_scale_detail->rank_id,
                     'description'=> $salary_scale_detail->description,
                     'monthly'=> $salary_scale_detail->monthly,
                     'daily'=> $salary_scale_detail->daily,
                     'percentage'=> $salary_scale_detail->percentage,
                     'days'=> $salary_scale_detail->days,
                     'remarks'=> $salary_scale_detail->remarks,
                     'add_to_total'=> $salary_scale_detail->add_to_total,
                    );
        VesselSalaryScale::where('salary_scale_detail_id',$id)->update($values);

    }
}
