
@extends('layouts.app')
@section('title', 'User Accounts')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User Accounts</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="mb-3">
              @can('user-accounts-create')
              <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
              @endcan
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            
            <table class="table table-bordered">
             <tr>
               <th>No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Roles</th>
               <th width="280px">Action</th>
             </tr>
             @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                       <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  @can('user-accounts-edit')
                  <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                  @endcan
                  @can('user-accounts-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  @endcan
                    
                </td>
              </tr>
             @endforeach
            </table>
            
            {!! $data->render() !!}
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection

