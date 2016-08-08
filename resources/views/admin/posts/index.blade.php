@extends('layouts.admin')


@section('content')

    @include('partials._flash_messages')

    <h2>Posts</h2>

    <table class="table">
        <thead>
          <tr>
            <th>#ID</th>

            <th>Author</th>
            <th>Title</th>
            <th>Body</th>
            <th>category</th>
            <th>photo</th>
            <th>created at</th>
            <th>updated at</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>


            @if($posts)

                 @foreach($posts as $post)
                  <tr>
                     <td>{{$post->id}}</td>

                     <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                     <td>{{$post->body}}</td>
                     <td>{{$post->category->name}}</td>
                     <td><img height="80" src="{{$post->photo? $post->photo->file : 'http://placehold.it/400x400'}}" alt="Post Image"/></td>
                     <td>{{$post->created_at->diffForHumans()}}</td>
                     <td>{{$post->updated_at->diffForHumans()}}</td>
                    @if(Auth::user()->name == $post->user->name )
                    <td>


                        <a href="{{route('admin.posts.edit' , $post->id)}}" class="btn btn-success">Edit</a>

                    </td>
                    <td>
                      {!! Form::open(['method' => 'DELETE' , 'action' => ['AdminPostsController@destroy' , $post->id]]) !!}

                          <div class="form-group">
                              {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
                          </div>

                      {!! Form::close() !!}

                    </td>
                    @endif
                  </tr>
                 @endforeach


            @endif



        </tbody>
      </table>

@stop

