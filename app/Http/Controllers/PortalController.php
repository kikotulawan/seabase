<?php

namespace App\Http\Controllers;

use App\Country;
use App\Crew;
use App\CrewRank;
use App\Http\Requests\CrewRequest;
use App\Rank;
use App\Repositories\CrewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
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
        return view('portal.index');
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

        $crew=$this->crewRepository->getById(Auth::user()->id);
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();

        //dd($crew);
        return view('portal.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $rank['data'] = Rank::orderby("rank","asc")
        			   ->select('id','rank')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();
        $crew = $this->crewRepository->getById(Auth::user()->id);

        return view('portal.edit',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
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
        //
    }
}
