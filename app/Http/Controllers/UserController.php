<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // $data = User::orderBy('id','DESC')->where('built_in',0)->paginate(5);
        // return view('users.index',compact('data'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
        $roles = Role::where('built_in',0)->pluck('name','id');
        return view('users.index',compact('roles'));
    }

    public function allUser(Request $request)
    {
        $columns = array(
            0 =>'name',
            1 =>'email',
            2 =>'position',
            3 =>'roles',
            4 => 'options'
        );

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $output = User::offset($start)
                    ->where('built_in', 0)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  User::where('name','LIKE',"%{$search}%")
                    ->orWhere('email', 'LIKE',"%{$search}%")
                    ->orWhere('built_in', 0)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = User::where('name','LIKE',"%{$search}%")
                    ->orWhere('email', 'LIKE',"%{$search}%")
                    ->orWhere('built_in', 0)
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['name'] = $value->name;
                $nestedData['email'] = $value->email;
                $nestedData['position'] = $value->position;
                $nestedData['roles'] = $value->getRoleNames();
                $btn='';
                if (Auth::user()->hasPermissionTo('user-accounts-edit'))
                {
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                }
                if (Auth::user()->hasPermissionTo('user-accounts-delete'))
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
        // $roles = Role::pluck('name','name')->all();
        // return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['company_id']=1;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

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
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        //dd($user);
        return response()->json(User::where('id',$id)->with('roles')->first());
        //return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            //$input = array_except($input,array('password'));
        }

        $user = User::find($request->id);
        $user->update($input);
        FacadesDB::table('model_has_roles')->where('model_id',$request->id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'Record has been deleted successfully.']);
    }
}
