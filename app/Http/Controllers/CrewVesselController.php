<?php

namespace App\Http\Controllers;

use App\CrewSalaryScale;
use App\CrewStatus;
use App\CrewVessel;
use App\Repositories\CrewRepository;
use App\VesselSalaryScale;
use Illuminate\Http\Request;

class CrewVesselController extends Controller
{

    private $crewRepository;

    public function __construct(CrewRepository $crewRepository)
    {
        $this->crewRepository=$crewRepository;
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
    public function store(Request $request)
    {
        $vessel=new CrewVessel();
        $vessel->crew_id=$request->crew_id;
        $vessel->vessel_id=$request->vessel_id;
        $vessel->user_id=auth()->id();
        $vessel->save();

        $crew_status=new CrewStatus();
        $crew_status->crew_id=$request->crew_id;
        $crew_status->status_id=6;
        $crew_status->save();

        $crew=$this->crewRepository->getById($request->crew_id);
        $vessel=VesselSalaryScale::where(['vessel_id' =>$crew->vessel_id,'rank_id' => $crew->rank_id])->get();


        foreach ($vessel as $v) {

            CrewSalaryScale::create([
                'crew_id' => $request->crew_id,
                'vessel_salary_scale_id' => $v->id,
                'rank_id' => $v->rank_id,
                'description' => $v->description,
                'monthly' => $v->monthly,
                'daily' => $v->daily,
                'percentage' => 0,
                'days' => 0,
                'remarks' => $v->remarks,
                'add_to_total' => $v->add_to_total
            ]);
        }
        //$data->vesselsalaryscale()->saveMany($vessels);
        return response()->json(['success' => 'Data is successfully updated']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
