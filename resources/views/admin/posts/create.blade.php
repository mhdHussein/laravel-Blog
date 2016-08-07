@extends('layouts.admin')


@section('content')

    <h2>Create Post</h2>

    @include('partials.form_errors')
    {!! Form::open(['method' => 'POST' , 'action' => 'AdminPostsController@store' , 'files' => true]) !!}

        @include('partials._postform')

        <div class="form-group">
            {!! Form::submit('Create Post' , ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@stop
