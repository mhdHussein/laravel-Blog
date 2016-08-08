@extends('layouts.admin')


@section('content')

    <h2>Edit Post</h2>

    <div class="col-sm-3">
        <img class="img-responsive" src="{{$post->photo->file}}" alt=""/>
    </div>
    <div class="col-sm-9">
        @include('partials.form_errors')
                {!! Form::model($post , ['method' => 'PATCH' , 'action' => ['AdminPostsController@update' , $post->id] , 'files' => true]) !!}

                    @include('partials._postform')

                    <div class="form-group">
                        {!! Form::submit('Edit Post' , ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}


    </div>

@stop
