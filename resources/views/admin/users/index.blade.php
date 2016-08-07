@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))

        <div class="alert alert-danger">
            {{session('deleted_user')}}
        </div>

    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        @if($users)

          @foreach($users as $user)

            <tr>
              <td>{{$user->id}}</td>
              <td><a href="{{route('admin.users.edit' , $user->id)}}">{{$user->name}}</a></td>
              <td><img height="80" src="{{$user->photo ? $user->photo->file : '/images/no-photo.png'}}" alt=""/></td>
              <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
              <td>
                {!! Form::open(['method' => 'DELETE' , 'action' => ['AdminUsersController@destroy' , $user->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('X' , ['class' => 'btn btn-danger']) !!}
                    </div>

                {!! Form::close() !!}

              </td>
            </tr>

          @endforeach

        @endif
        </tbody>
      </table>

@stop