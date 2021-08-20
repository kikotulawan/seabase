<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\RankEditRequest;
use App\Http\Requests\RankRequest;
use App\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $department['data'] = Department::orderby("department","asc")
        			   ->select('id','department')
        			   ->get();

    	return view('ranks.index')->with("department",$department);
    }

    public function getRank()
    {
        return response()->json(Rank::select('id','rank')->orderBy('rank','asc')->get());
    }

    public function allRanks(Request $request)
    {
        $columns = array(
            0 =>'rank',
            1 =>'code',
            2 =>'department_id',
            3 => 'options'
        );

        $totalData = Rank::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Rank::offset($start)
                ->with('department')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Rank::where('rank','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Rank::where('rank','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['rank'] = $value->rank;
                $nestedData['code'] = $value->code;
                $nestedData['department'] = $value->department;

                $btn='';
                if (Auth::user()->hasPermissionTo('ranks-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('ranks-delete'))
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
    public function store(RankRequest $request)
    {

        $request->user()->rank()->create($request->all());
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
        return response()->json(Rank::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RankRequest $request)
    {
        Rank::find($request->id)->update($request->all());

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
        Rank::find($id)->delete();
        return response()->json(['success'=>'Airport deleted successfully.']);
    }
}
