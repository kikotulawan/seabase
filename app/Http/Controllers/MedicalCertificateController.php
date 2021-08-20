<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalCertificateEditRequest;
use App\Http\Requests\MedicalCertificateRequest;
use App\MedicalCertificate;
use CreateMedicalCertificatesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicalcertificates.index');
    }

    public function getMedicalCertificate()
    {
        return response()->json(MedicalCertificate::all()->pluck('medicalcertificate', 'id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allMedicalCertificates(Request $request)
    {
        $columns = array(
            0 =>'medicalcertificate',
            1 =>'notifydays',
            2 =>'options'
        );

        $totalData = MedicalCertificate::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = MedicalCertificate::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  MedicalCertificate::where('medicalcertificate','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = MedicalCertificate::where('medicalcertificate','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('medicalcertificates.show',$value->id);
                $edit =  route('medicalcertificates.edit',$value->id);

                $nestedData['medicalcertificate'] = $value->medicalcertificate;
                $nestedData['notifydays'] = $value->notifydays;
                $btn='';
                if (Auth::user()->hasPermissionTo('medical-certificates-edit'))                 {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('medical-certificates-delete'))                 {
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
    public function store(MedicalCertificateRequest $request)
    {

        $request->user()->medical_certificate()->create($request->all());
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
        return response()->json(MedicalCertificate::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalCertificateRequest $request)
    {
        MedicalCertificate::findOrFail($request->id)->update($request->all());


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
        MedicalCertificate::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
