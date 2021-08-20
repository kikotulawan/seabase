<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Crew;
use App\Embarkation;
use App\Repositories\CrewRepository;
use App\Repositories\EmbarkationRepository;
use App\Repositories\TravelDocumentRepository;
use App\Seaport;
use App\Status;
use App\Vessel;
use Illuminate\Http\Request;

class DisembarkationController extends Controller
{

    private $_embarkation;
    public function __construct(EmbarkationRepository $embarkation)
    {
        $this->_embarkation=$embarkation;
    }
    public function allDisembarkation(Request $request)
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

                $nestedData['options'] = "<a href='".route('disembarkations.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $vessel=Vessel::all();
        // $airport=Airport::all();
        // $seaport=Seaport::all();
        $crew=Crew::find(8);
        // $embarkation=Embarkation::findOrFail($id);
        // $status=Status::where('id',7)->orWhere('id',11)->get();
        $embarkation=$this->_embarkation->embarkation($id);
        //return view('applicants.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
        return view('disembarkation.show',compact(array('crew','embarkation')));

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
