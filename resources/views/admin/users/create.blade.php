@extends('layouts.admin')


@section('content')

    <h1>Create User</h1>

    @include('partials.form_errors')

    {!! Form::open(['method' => 'POST' , 'action' => 'AdminUsersController@store' , 'files' => true]) !!}

        @include('partials._userform')

        <div class="form-group">
            {!! Form::submit('Create User' , ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}



@stop