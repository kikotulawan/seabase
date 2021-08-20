<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crew;
use App\Rank;
use App\Country;
use App\Repositories\CrewRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{

    private $crewRepository;

    public function __construct(CrewRepository $crewRepository)
    {
        $this->crewRepository=$crewRepository;
    }
    public function allApplicant(Request $request)
    {
        $columns = array(
            0 =>'crew_no',
            1 =>'crew_name',
            2 =>'rank',
            2 =>'status',
            2 =>'application_date',
            3 =>'options'
        );

        $totalData = $this->crewRepository->applicants()->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = $this->crewRepository->applicants()
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  $this->crewRepository->applicants()
                ->where('first_name', 'LIKE',"%{$search}%")
                ->orWhere('last_name', 'LIKE',"%{$search}%")
                ->orWhere('rank', 'LIKE',"%{$search}%")
                ->orWhere('status', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
        ->get();

        $totalFiltered = $this->crewRepository->applicants()
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
                $edit =  route('applicants.show',$value->id);

                $nestedData['crew_no'] = $value->crew_no;
                $nestedData['crew_name'] = $value->last_name .', ' . $value->first_name;
                $nestedData['rank'] = $value->rank;
                $nestedData['status'] = $value->status;
                $nestedData['application_date'] = $value->application_date;

                $btn='';
                if (Auth::user()->hasPermissionTo('applicant-can-edit')) //If user has this //permission
                {
                    $btn.= "<a href='".route('applicants.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-eye'></a>";
                }
                if (Auth::user()->hasPermissionTo('applicant-can-delete')) //If user has this //permission
                {
                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                }
                $nestedData['options']=$btn;
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

    public function index(){
        return view('applicants.index');
    }

    public function show($id)
    {
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();
        $crew = $this->crewRepository->getById($id);


        //dd($crew);
        return view('applicants.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }

    public function create()
    {
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
                       ->get();
        $crew=new Crew();
        return view('applicants.create',['rank' => $rank,'country' => $country,'crew' => $crew]);
    }

    public function edit($id)
    {
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();
        $crew = $this->crewRepository->getById($id);
        //dd($crew);
        return view('applicants.edit',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }
}
