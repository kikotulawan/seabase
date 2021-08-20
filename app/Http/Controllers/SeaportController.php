<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\SeaportRequest;
use App\Seaport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();

    	return view('seaports.index')->with("country",$country);
    }


    public function allSeaports(Request $request){
        $columns = array(
            0 =>'code',
            1 =>'seaport',
            1 =>'country_id',
            2=> 'options'
        );

        $totalData = Seaport::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $seaports = Seaport::offset($start)
                ->with('country')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $seaports =  Seaport::where('code','LIKE',"%{$search}%")
                    ->orWhere('seaport', 'LIKE',"%{$search}%")
                    ->with('country')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Seaport::where('code','LIKE',"%{$search}%")
                    ->orWhere('seaport', 'LIKE',"%{$search}%")
                    ->with('country')
                    ->count();
        }

        $data = array();
        if(!empty($seaports))
        {
            foreach ($seaports as $value)
            {

                $nestedData['code'] = $value->code;
                $nestedData['seaport'] = $value->seaport;
                $nestedData['country'] = $value->country ;
                $btn='';
                if (Auth::user()->hasPermissionTo('seaport-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('seaport-delete'))
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
    public function store(SeaportRequest $request)
    {
        $request->user()->seaport()->create($request->all());
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
        return response()->json(Seaport::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeaportRequest $request)
    {
        Seaport::findOrFail($request->id)->update($request->all());

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
        Seaport::find($id)->delete();
        return response()->json(['success'=>'Seaport deleted successfully.']);
    }
}
