<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignatoryRequest;
use App\Signatory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignatoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('signatories.index');
    }

    public function getSignatories(){
        return response()->json(Signatory::orderBy('name','asc')->get());
    }
    public function allSignatory(Request $request)
    {
        $columns = array(
            0 =>'name',
            1 =>'position',
            1 =>'options'
        );

        $totalData = Signatory::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Signatory::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Signatory::where('name','LIKE',"%{$search}%")
                    ->orWhere('position', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Signatory::where('name','LIKE',"%{$search}%")
                    ->orWhere('position', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['name'] = $value->name;
                $nestedData['position'] = $value->position;
                $btn='';
                if (Auth::user()->hasPermissionTo('banks-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('banks-delete'))                 {
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
    public function store(SignatoryRequest $request)
    {

        $request->user()->signatory()->create(
            $request->all()
        );
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
        $signatory = Signatory::find($id);
        return response()->json($signatory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SignatoryRequest $request)
    {
        Signatory::findOrFail($request->id)->update($request->all());

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
        Signatory::find($id)->delete();
        return response()->json(['success'=>'Signatory deleted successfully.']);
    }
}
