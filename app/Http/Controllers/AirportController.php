<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Country;
use App\Http\Requests\AirportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();

    	return view('airports.index')->with("country",$country);

    }

    public function allAirports(Request $request)
    {
        $columns = array(
            0 =>'code',
            1 =>'airport',
            1 =>'country_name',
            2=> 'options'
        );

        $totalData = Airport::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $airports = Airport::offset($start)
                //->with('country')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $airports =  Airport::where('code','LIKE',"%{$search}%")
                    ->orWhere('airport', 'LIKE',"%{$search}%")
                    ->orWhere('country.country', 'LIKE',"%{$search}%")
                    ->with('country')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Airport::where('code','LIKE',"%{$search}%")
                    ->orWhere('airport', 'LIKE',"%{$search}%")
                    ->orWhere('country.country', 'LIKE',"%{$search}%")
                    ->with('country')
                    ->count();
        }

        $data = array();
        if(!empty($airports))
        {
            foreach ($airports as $value)
            {


                $nestedData['code'] = $value->code;
                $nestedData['airport'] = $value->airport;
                $nestedData['country'] = $value->country;
                $btn='';
                if (Auth::user()->hasPermissionTo('airports-edit')) //If user has this //permission
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('airports-delete')) //If user has this //permission
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
    public function store(AirportRequest $request)
    {
        $request->user()->airport()->create($request->all());
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
        $airport = Airport::find($id);
        return response()->json($airport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportRequest $request)
    {
        Airport::findOrFail($request->id)->update($request->all());

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
        Airport::find($id)->delete();
        return response()->json(['success'=>'Airport deleted successfully.']);
    }
}
