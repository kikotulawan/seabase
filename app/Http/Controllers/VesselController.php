<?php

namespace App\Http\Controllers;

use App\Country;
use App\Crew;
use App\FlagStateDocument;
use App\Http\Requests\VesselRequest;
use App\Principal;
use App\Rank;
use App\TradeRoute;
use App\Vessel;
use App\VesselSalaryScale;
use App\VesselType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vessels.index');
    }

    public function vesselsalaryscale($id){
        $output=VesselSalaryScale::where([
            'vessel_id' => $id
            ])->get();
            $data1 = VesselSalaryScale::selectRaw('rank_id,SUM(monthly) as monthly,sum(daily) as daily')->where(['add_to_total'=>1,'vessel_id'=> $id])
            ->groupBy(['rank_id'])->get();
            if($output->count()>0){
                foreach($data1 as $alphabet => $collection) {
                    $s=new VesselSalaryScale();
                    $s->salary_scale_detail_id=$collection->salary_scale_detail_id;
                    $s->rank_id=$collection->rank_id;
                    $s->monthly=$collection->monthly;
                    $s->daily=$collection->daily;
                    $s->description='Total';
                    $s->add_to_total=0.1;
                    $output->push($s);
                }
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
    public function allVessel(Request $request)
    {
        $output=Vessel::all();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $nestedData['id'] = $value->id;
                $nestedData['code'] = $value->code;
                $nestedData['vessel_name'] = $value->vessel_name;
                $nestedData['call_sign'] = $value->call_sign;
                $nestedData['vesseltype'] = $value->vesseltype;
                $nestedData['contact_person'] = $value->contact_person;
                $nestedData['manager'] = $value->manager;

                $nestedData['principal'] = $value->principal;

                $btn='';
                if (Auth::user()->hasPermissionTo('vessel-edit')) //If user has this //permission
                {
                    $btn.= "<a href='".route('vessels.edit',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-eye'></a>";
                }
                if (Auth::user()->hasPermissionTo('vessel-delete')) //If user has this //permission
                {
                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                }
                $nestedData['options']=$btn;
                // $nestedData['options'] = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                //             <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                $data[] = $nestedData;

            }
        }
        $json_data = array(

            "data"            => $data
            );

            return json_encode($json_data);

    }

    public function getVessel(){
        return response()->json(Vessel::orderBy('vessel_name','asc')->get());
    }
    public function vessel($id){
        $output=Vessel::where([
            'principal_id' => $id
            ])->get();

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['code'] = $value->code;
                $nestedData['vessel_name'] = $value->vessel_name;
                $nestedData['call_sign'] = $value->call_sign;
                $nestedData['vesseltype'] = $value->vesseltype;
                $nestedData['flagstatedocument'] = $value->flagstatedocument;
                $nestedData['contact_person'] = $value->contact_person;
                $nestedData['manager'] = $value->manager;
                $nestedData['principal'] = $value->principal;


                $data[] = $nestedData;
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
        $flag['data'] = FlagStateDocument::orderby("flag","asc")
        			   ->select('id','flag')
        			   ->get();
        $vessel_type['data'] = VesselType::orderby("vessel_type","asc")
            ->select('id','vessel_type')
            ->get();
        $principal['data'] = Principal::orderby("principal","asc")
            ->select('id','principal')
            ->get();
        $trade['data'] = TradeRoute::orderby("route_name","asc")
            ->select('id','route_name')
            ->get();
        $vessels=new Vessel();

        return view('vessels.create',['trade' => $trade,'principal' =>$principal,'flag' => $flag,'vessel_type' => $vessel_type,'vessel' => $vessels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VesselRequest $request)
    {

        $request->user()->vessel()->create($request->all());
        return response()->json(['success'=>'Data saved successfully.']);
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
        $flag['data'] = FlagStateDocument::orderby("flag","asc")
        			   ->select('id','flag')
        			   ->get();
        $vessel_type['data'] = VesselType::orderby("vessel_type","asc")
            ->select('id','vessel_type')
            ->get();
        $principal['data'] = Principal::orderby("principal","asc")
            ->select('id','principal')
            ->get();
        $trade['data'] = TradeRoute::orderby("route_name","asc")
            ->select('id','route_name')
            ->get();
        $vessels= Vessel::find($id);

        return view('vessels.edit',['trade' => $trade,'principal' =>$principal,'flag' => $flag,'vessel_type' => $vessel_type,'vessel' => $vessels]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VesselRequest $request)
    {
        Vessel::findOrFail($request->id)->update($request->all());


        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vessel::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
