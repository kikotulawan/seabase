<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Requests\AgentEditRequest;
use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('agents.index');
    }

    public function getAgent(){
        return response()->json(Agent::orderBy('agent','asc')->get());
    }
    public function allAgents(Request $request)
    {
        $columns = array(
            0 =>'agent',
            1 =>'address',
            2 =>'telephone',
            3 =>'fax',
            4 > 'options'
        );

        $totalData = Agent::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Agent::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Agent::where('agent','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Agent::where('agent','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('agents.show',$value->id);
                $edit =  route('agents.edit',$value->id);

                $nestedData['agent'] = $value->agent;
                $nestedData['address'] = $value->address;
                $nestedData['telephone'] = $value->telephone;
                $nestedData['fax'] = $value->fax;

                $btn='';
                if (Auth::user()->hasPermissionTo('agents-edit')) //If user has this //permission
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('agents-delete')) //If user has this //permission
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentRequest $request)
    {

        $request->user()->agent()->create(
            $request->all()
        );

        return response()->json(['success'=>'Agent saved successfully.']);
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        return response()->json($agent);
    }

    public function update(AgentRequest $request)
    {
        Agent::findOrFail($request->id)->update($request->all());
        // $update = Agent::find($request->id);
        // $update->fill($request->all());
        // $update['user_id']=auth()->id();
        // $update->save();

        return response()->json(['success' => 'Data is successfully updated']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::find($id)->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
