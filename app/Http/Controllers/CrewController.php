<?php

namespace App\Http\Controllers;

use App\Country;
use App\Crew;
use App\CrewRank;
use App\CrewStatus;
use App\Http\Requests\CrewRequest;
use App\Rank;
use App\Repositories\CrewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CrewController extends Controller
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
        return  view('crews.index');
    }

    public function getCrewByVessel($id)
    {
        //dd($this->crewRepository->crews()->where('vessel_id',$id)->get());
        return response()->json($this->crewRepository->crews()
                    ->where('vessel_id',$id)
                    ->where('status_id',6)
                    ->get());
    }

    public function allCrews(Request $request)
    {
        $columns = array(
            0 =>'crew_no',
            1 =>'crew_name',
            1 =>'rank',
            1 =>'status',
            2 =>'application_date',
            3 =>'options'
        );

        $totalData = $this->crewRepository->crews()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = $this->crewRepository->crews()
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  $this->crewRepository->crews()
                    ->where('first_name', 'LIKE',"%{$search}%")
                    ->orWhere('last_name', 'LIKE',"%{$search}%")
                    ->orWhere('rank', 'LIKE',"%{$search}%")
                    ->orWhere('status', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = $this->crewRepository->crews()
                    ->where('first_name', 'LIKE',"%{$search}%")
                    ->orWhere('last_name', 'LIKE',"%{$search}%")
                    ->orWhere('rank', 'LIKE',"%{$search}%")
                    ->orWhere('status', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('crews.show',$value->id);
                $edit =  route('crews.edit',$value->id);

                $nestedData['crew_no'] = $value->crew_no;
                $nestedData['crew_name'] = $value->last_name .', ' . $value->first_name;
                $nestedData['rank'] = $value->rank;
                $nestedData['status'] = $value->status;
                $nestedData['application_date'] = $value->application_date;
                $btn='';
                if (Auth::user()->hasPermissionTo('crew-management-view')) //If user has this //permission
                {
                    $btn.= "<a href='".route('crews.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-eye'></a>";
                }
                if (Auth::user()->hasPermissionTo('crew-management-delete')) //If user has this //permission
                {
                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                }
                $nestedData['options']=$btn;
                // if (Auth::user()->hasPermissionTo('applicant-can-delete')) //If user has this //permission
                // {
                //     $nestedData['options'] = "<a href='".route('crews.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-eye'></a>
                //     <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                // }

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
    // public function create()
    // {
    //     $rank['data'] = Rank::orderby("rank","asc")
    //     			   ->select('id','rank')
    //     			   ->get();
    //     $country['data'] = Country::orderby("country","asc")
    //     			   ->select('id','country')
    //                    ->get();
    //     $crew=new Crew();
    //     return view('crews.create',['rank' => $rank,'country' => $country,'crew' => $crew]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrewRequest $request)
    {

        $data = $request->all();


        $crew_no = str_pad(mt_rand(1000000, 9999999), 8, "0", STR_PAD_LEFT);
        $data['status_id']=1;
        $data['password'] = Hash::make(123456);
        if ($request->has('image_path')) {
            $destination = 'public/uploads/' . $crew_no;
            Storage::makeDirectory($destination);
            $image= $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path=$request->image_path->storeAs($destination,$image_name);//$image->move($folder);
            $data['image_path']=$image_name;
        }

        $data['crew_no']=$crew_no;

        $crew=$request->user()->crew()->create($data);
        $crew_rank=new CrewRank();
        $crew_rank->crew_id=$crew->id;
        $crew_rank->rank_id=$request->rank_id;
        $crew_rank->save();


        $crew_status=new CrewStatus();
        $crew_status->crew_id=$crew->id;
        $crew_status->status_id=1;
        $crew_status->save();
        //$crew->crewrank()->save($crew_rank);
        // $crew_rank=new CrewRank();
        // $crew_rank->rank_id=$request->rank_id;
        // $data->crewrank()->associate($crew_rank);
        // $data->save();



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

        $crew=$this->crewRepository->getById($id);
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();

        //dd($crew);
        return view('crews.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();
        $crew = $this->crewRepository->getById($id);

        return view('crews.edit',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewRequest $request)
    {
        $update=Crew::find($request->id);
        $update->fill($request->all());
        $request['user_id']=auth()->id();

        if ($request->has('image_path')) {

            $destination = 'public/uploads/' . $request->crew_no;
            $image= $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path=$request->image_path->storeAs($destination,$image_name);//$image->move($folder);
            $update['image_path']=$image_name;
        }
        $update->save();

        $rank=$this->crewRepository->getById($request->id);
        if($rank->rank_id<>$request->rank_id){
            $crew_rank=new CrewRank();
            $crew_rank->crew_id=$request->id;
            $crew_rank->rank_id=$request->rank_id;
            $crew_rank->save();
        }
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
        $delete=Crew::find($id);
        Storage::deleteDirectory('public/uploads/' . $delete->crew_no);
        $delete->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
