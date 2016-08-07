@extends('layouts.admin')


@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->file : '/images/no-photo.png' }}" alt="Personal Photo"/>
    </div>

   <div class="col-sm-9">
       @include('partials.form_errors')

          {!! Form::model($user , ['method' => 'PATCH' , 'action' => ['AdminUsersController@update' , $user->id] , 'files' => true]) !!}

              @include('partials._userform')

              <div class="form-group">
                  {!! Form::submit('Edit User' , ['class' => 'btn btn-primary']) !!}
              </div>

          {!! Form::close() !!}
   </div>



@stop