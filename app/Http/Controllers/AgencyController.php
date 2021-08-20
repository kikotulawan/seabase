<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Http\Requests\AgencyEditRequest;
use App\Http\Requests\AgencyRequest;
use App\Http\Requests\AgentEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manningagencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allManningAgencies(Request $request)
    {
        $columns = array(
            0 =>'agency',
            1 =>'code',
            2 =>'telephone',
            3 =>'contact_person',
            4 =>'address',
            5 =>'options'
        );

        $totalData = Agency::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Agency::offset($start)
                ->where('active', 0)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Agency::where('agency','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->orWhere('active', 0)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Agency::where('agency','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->orWhere('active', 0)
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['code'] = $value->code;
                $nestedData['agency'] = $value->agency;
                $nestedData['telephone'] = $value->telephone;
                $nestedData['contact_person'] = $value->contact_person;
                $nestedData['address'] = $value->address;

                $btn='';
                if (Auth::user()->hasPermissionTo('manning-agency-edit')) //If user has this //permission
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('manning-agency-delete')) //If user has this //permission
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
    public function store(AgencyRequest $request)
    {

        $request->user()->agency()->create($request->all());
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
        $manningagency = Agency::find($id);
        return response()->json($manningagency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgencyRequest $request)
    {
        Agency::findOrFail($request->id)->update($request->all());


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
        Agency::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
