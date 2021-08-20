<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Http\Requests\AnnouncementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {

        return view('announcements.index');
    }


    public function allAnnouncement(Request $request)
    {
        $columns = array(
            0 =>'announcement',
            1 =>'file'

        );

        $totalData = Announcement::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Announcement::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Announcement::where('announcement','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Announcement::where('announcement','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['announcement'] = $value->announcement;
                $nestedData['file'] = $value->file;


                $btn='';
                if (Auth::user()->hasPermissionTo('announcement-edit')) //If user has this //permission
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('announcement-delete')) //If user has this //permission
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
    public function store(AnnouncementRequest $request)
    {

        $request->user()->announcement()->create(
            $request->all()
        );

        return response()->json(['success'=>'Record has been saved successfully.']);
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return response()->json($announcement);
    }

    public function update(AnnouncementRequest $request)
    {
        Announcement::findOrFail($request->id)->update($request->all());

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
        Announcement::find($id)->delete();

        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
