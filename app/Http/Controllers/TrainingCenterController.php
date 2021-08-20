<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingCenterEditRequest;
use App\Http\Requests\TrainingCenterRequest;
use App\TrainingCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('training_centers.index');
    }


    public function getTrainingCenter()
    {
        return response()->json(TrainingCenter::all()->pluck('center', 'id'));
    }
    public function allTrainingCenters(Request $request)
    {
        $columns = array(
            0 =>'center',
            1 =>'code',
            2 =>'telephone',
            3 =>'contact_person',
            4 =>'address',
            5 =>'options'
        );

        $totalData = TrainingCenter::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = TrainingCenter::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  TrainingCenter::where('center','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = TrainingCenter::where('center','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                $show =  route('training_centers.show',$value->id);
                $edit =  route('training_centers.edit',$value->id);

                $nestedData['code'] = $value->code;
                $nestedData['center'] = $value->center;
                $nestedData['telephone'] = $value->telephone;
                $nestedData['contact_person'] = $value->contact_person;
                $nestedData['address'] = $value->address;
                $btn='';
                if (Auth::user()->hasPermissionTo('training-center-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('training-center-delete'))
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
    public function store(TrainingCenterRequest $request)
    {

        $request->user()->training_center()->create($request->all());
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
        return response()->json(TrainingCenter::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingCenterRequest $request)
    {
        TrainingCenter::find($request->id)->update($request->all());

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
        TrainingCenter::find($id)->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
