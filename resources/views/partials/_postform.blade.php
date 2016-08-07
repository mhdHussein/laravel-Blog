<div class="form-group">
    {!! Form::label('title' , 'Title:') !!}
    {!! Form::text('title' , null , ['class' => 'form-control']) !!}

    {!! Form::label('category_id' , 'Category:') !!}
    {!! Form::select('category_id' , ['' => 'Choose a category'] + $categories ,null , ['class' => 'form-control']) !!}

    {!! Form::label('photo_id' , 'The Photo:') !!}
    {!! Form::file('photo_id' ,  ['class' => 'form-control']) !!}


    {!! Form::label('body' , 'The Post:') !!}
    {!! Form::textarea('body' , null , ['class' => 'form-control'  ]) !!}


</div>

