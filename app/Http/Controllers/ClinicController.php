<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Http\Requests\ClinicEditRequest;
use App\Http\Requests\ClinicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clinics.index');
    }

    public function getClinic(){
        return response()->json(Clinic::orderBy('clinic','asc')->get());
    }
    // public function getClinic()
    // {
    //     return response()->json(Clinic::all()->pluck('clinic', 'id'));
    // }
    public function allClinics(Request $request)
    {
        $columns = array(
            0 =>'clinic',
            1 =>'telephone',
            2 =>'contact_person',
            3 =>'options'
        );

        $totalData = Clinic::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Clinic::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Clinic::where('clinic','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Clinic::where('clinic','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('clinics.show',$value->id);
                $edit =  route('clinics.edit',$value->id);

                $nestedData['clinic'] = $value->clinic;
                $nestedData['telephone'] = $value->telephone;
                $nestedData['contact_person'] = $value->contact_person;
                $btn='';
                if (Auth::user()->hasPermissionTo('medical-clinics-edit'))                 {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('medical-clinics-delete'))                 {
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
    public function store(ClinicRequest $request)
    {

        $request->user()->clinic()->create(
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
        return response()->json(Clinic::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request)
    {
        Clinic::find($request->id)->update($request->all());


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
        Clinic::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
