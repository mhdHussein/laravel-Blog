<div class="form-group">
    {!! Form::label('title' , 'Title:') !!}
    {!! Form::text('title' , null , ['class' => 'form-control']) !!}

    {!! Form::label('category' , 'Category:') !!}
    {!! Form::select('category' , array(1 => 'PHP' , 0 => 'Javascript') ,null , ['class' => 'form-control']) !!}

    {!! Form::label('photo_id' , 'The Photo:') !!}
    {!! Form::file('photo_id' ,  ['class' => 'form-control']) !!}


    {!! Form::label('body' , 'The Post:') !!}
    {!! Form::textarea('body' , null , ['class' => 'form-control'  ]) !!}


</div>

