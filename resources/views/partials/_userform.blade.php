 <div class="form-group">
            {!! Form::label('name' , 'Name:') !!}
            {!! Form::text('name' , null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email' , 'Email:') !!}
            {!! Form::email('email' ,  null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active' , 'Status:') !!}
            {!! Form::select('is_active' , [  1 => 'Active' , 0 => 'Not Active'] , Request::is('admin/users/create') ? 0 : null ,  ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id' , 'Role:') !!}
            {!! Form::select('role_id', ['' => 'Choose Role'] + $roles  , null , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password' , 'Password:') !!}
            {!! Form::password('password'  , ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id' , 'Personal Photo:') !!}
            {!! Form::file('photo_id' , null , ['class' => 'form-control']) !!}
        </div>
