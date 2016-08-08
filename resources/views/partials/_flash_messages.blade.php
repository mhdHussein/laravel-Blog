@if(Session::has('deleted_user'))

    <div class="alert alert-danger">
        {{session('deleted_user')}}
    </div>
@endif
@if(Session::has('post_deleted'))

     <div class="alert alert-danger">
            {{session('post_deleted')}}
     </div>
@endif
@if(Session::has('cetegory_deleted'))

     <div class="alert alert-danger">
            {{session('cetegory_deleted')}}
     </div>
@endif
