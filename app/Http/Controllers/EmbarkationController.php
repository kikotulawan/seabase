<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Crew;
use App\CrewStatus;
use App\Embarkation;
use App\EmbarkationDetail;
use App\Http\Requests\EmbarkationRequest;
use App\Repositories\CrewRepository;
use App\Seaport;
use App\Status;
use App\Vessel;
use Illuminate\Http\Request;

class EmbarkationController extends Controller
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
        return view('embarkations.index');
    }

    public function disembarkation()
    {
        return view('disembarkation.index');
    }

    public function allEmbarkation(Request $request)
    {
        $columns = array(
            0 =>'code',
            1 =>'principal',
            2 =>'accreditation_date',
            3 =>'expiry_date',
            4 =>'options'
        );

        $totalData = Embarkation::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Embarkation::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Embarkation::where('code','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Embarkation::where('code','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['id'] = $value->id;
                $nestedData['code'] = $value->code;
                $nestedData['status'] = $value->status;
                $nestedData['principal'] = $value->vessel->principal->principal;
                $nestedData['embarkationplace'] = $value->embarkationplace->seaport;
                $nestedData['disembarkationplace'] = $value->disembarkationplace;
                $nestedData['vessel'] = $value->vessel->vessel_name;
                $nestedData['accreditation_date'] = $value->accreditation_date;
                $nestedData['departure_date'] = $value->departure_date;
                $nestedData['embarkation_date'] = $value->embarkation_date;
                $nestedData['disembarkation_date'] = $value->disembarkation_date;
                $nestedData['arrival_date'] = $value->arrival_date;

                $nestedData['options'] = "<a href='".route('embarkations.edit',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                                          <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );

        echo json_encode($json_data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vessel=Vessel::all();
        $airport=Airport::all();
        $seaport=Seaport::all();
        $embarkation=new Embarkation([
            'code' => 'E-'. str_pad(mt_rand(10000, 99999), 3, "0", STR_PAD_LEFT)
        ]);
        //$list=Crew::all();
        $status=Status::where('id',7)->orWhere('id',11)->get();
        return view('embarkations.create',['status' => $status, 'vessel' => $vessel,'airport' => $airport,'seaport' => $seaport,'embarkation' => $embarkation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmbarkationRequest $request)
    {

        $embarkation = $request->user()->embarkation()->create($request->all());

        $crew = $request->input('crews', []);

        $crews = [];
        if($crew){
            foreach ($request['crews'] as $c) {
                $data=$this->crewRepository->getById($c);
                $status=CrewStatus::create([
                    'crew_id' => $c,
                    'status_id' => $request->status_id
                ]);
                $crews[] = new EmbarkationDetail([
                    'embarkation_id' => $embarkation->id,
                    'crew_id' => $c,
                    'rank_id' => $data->rank_id,
                ]);
            }
        }


        $embarkation->embarkationdetail()->saveMany($crews);

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
        $vessel=Vessel::all();
        $airport=Airport::all();
        $seaport=Seaport::all();
        $list=Crew::all();
        $embarkation=Embarkation::findOrFail($id);
        $status=Status::where('id',7)->orWhere('id',11)->get();
        //return view('applicants.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
        return view('embarkations.edit',['status' => $status,'list' => $list, 'vessel' => $vessel,'airport' => $airport,'seaport' => $seaport,'embarkation' => $embarkation]);
    }


    public function crew($id)
    {
        $list=EmbarkationDetail::where('embarkation_id',$id)->with('crew')->get()->map(function($q){
            return [
                'id' => $q->id,
                'name' => $q->crew->last_name . ', ' .$q->crew->first_name .' '.$q->middle_name,


            ];
        });
        $json_data = array(

            "data"            => $list
            );

        echo json_encode($json_data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmbarkationRequest $request)
    {


        $update=Embarkation::findOrFail($request->id);
        $update->fill($request->all());
        $update->save();
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Embarkation::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
