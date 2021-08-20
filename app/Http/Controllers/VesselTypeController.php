<?php

namespace App\Http\Controllers;

use App\Http\Requests\VesselTypeRequest;
use App\VesselType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VesselTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vesseltypes.index');
    }

    public function allVesselTypes(Request $request)
    {
        $columns = array(
            0 =>'vessel_type',
            1 =>'code',
            2 =>'options'
        );

        $totalData = VesselType::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = VesselType::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  VesselType::where('vessel_type','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = VesselType::where('vessel_type','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('vesseltypes.show',$value->id);
                $edit =  route('vesseltypes.edit',$value->id);

                $nestedData['code'] = $value->code;
                $nestedData['vessel_type'] = $value->vessel_type;

                $btn='';
                if (Auth::user()->hasPermissionTo('vessel-type-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('vessel-type-delete'))
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
    public function store(VesselTypeRequest $request)
    {
        $request->user()->vessel_type()->create($request->all());
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
        return response()->json(VesselType::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VesselTypeRequest $request)
    {
        VesselType::find($request->id)->update($request->all());

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
        VesselType::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
