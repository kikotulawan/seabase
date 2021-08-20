<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Http\Requests\AirlineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('airlines.index');
    }

    public function allAirlines(Request $request){
        $columns = array(
            0 =>'code',
            1 =>'airline',
            2=> 'options'
        );

        $totalData = Airline::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $airlines = Airline::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $airlines =  Airline::where('code','LIKE',"%{$search}%")
                    ->orWhere('airline', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Airline::where('code','LIKE',"%{$search}%")
                    ->orWhere('airline', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($airlines))
        {
            foreach ($airlines as $value)
            {


                $nestedData['code'] = $value->code;
                $nestedData['airline'] = $value->airline;
                $btn='';
                if (Auth::user()->hasPermissionTo('airlines-edit')) //If user has this //permission
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('airlines-delete')) //If user has this //permission
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
    public function store(AirlineRequest $request)
    {
        $request->user()->airline()->create($request->all());
        return response()->json(['success'=>'Airline saved successfully.']);

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
        $airline = Airline::find($id);
        return response()->json($airline);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirlineRequest $request)
    {
        Airline::findOrFail($request->id)->update($request->all());

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
        Airline::find($id)->delete();
        return response()->json(['success'=>'Airline deleted successfully.']);

    }
}
