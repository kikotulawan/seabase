<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\PrincipalRequest;
use App\Principal;
use Illuminate\Http\Request;

class PrincipalController extends Controller
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

        return view('principals.index')->with("country",$country);
    }

    public function allPrincipals(Request $request)
    {
        $columns = array( 
            0 =>'code', 
            1 =>'principal',
            2 =>'accreditation_date',
            3 =>'expiry_date',
            4 =>'options'
        );

        $totalData = Principal::count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
        $output = Principal::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value'); 

        $output =  Principal::where('code','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Principal::where('code','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                

                $nestedData['code'] = $value->code;
                $nestedData['principal'] = $value->principal;
                $nestedData['accreditation_date'] = $value->accreditation_date;
                $nestedData['expiry_date'] = $value->expiry_date;
                $nestedData['country'] = $value->country;
                
                $nestedData['options'] = "<a href='".route('principals.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default edit far fa-edit'></a>
                                          <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
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
    public function store(PrincipalRequest $request)
    {
        $request->user()->principal()->create($request->all());
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

        $country['data'] = Country::orderby("country","asc")
        ->select('id','country')
        ->get();
        $principal=Principal::find($id);
        return view('principals.show',['principal' => $principal,'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Principal::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrincipalRequest $request)
    {
        Principal::findOrFail($request->id)->update($request->all());
        

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
        Principal::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
