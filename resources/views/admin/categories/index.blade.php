@extends('layouts.admin')


@section('content')

   @include('partials._flash_messages')

    <h1>Categories</h1>

    <div class="col-sm-3">

           {!! Form::open(['method' => 'POST' , 'action' => 'AdminCategoriesController@store']) !!}
               <div class="form-group">
                   {!! Form::label('name' , 'Name:') !!}
                   {!! Form::text('name' , null , ['class' => 'form-control']) !!}
               </div>

               <div class="form-group">
                   {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}
               </div>

           {!! Form::close() !!}


    </div>

    <div class="col-sm-9">

        <table class="table">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at? $category->created_at->diffForHumans() : 'No Date'}}</td>
                <td>{{$category->updated_at? $category->updated_at->diffForHumans() : 'No Date'}}</td>
                <td><a class="btn btn-success" href="{{route('admin.categories.edit' , $category->id)}}">Edit</a></td>
                <td>

                    {!! Form::open(['method' => 'DELETE' , 'action' => ['AdminCategoriesController@destroy' , $category->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('X' , ['class' => 'btn btn-danger']) !!}
                        </div>

                    {!! Form::close() !!}

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

    </div>

@stop