@extends('layouts.admin')


@section('content')

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

                  </tr>
                 @endforeach


            @endif



        </tbody>
      </table>

@stop

