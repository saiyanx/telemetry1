@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Member</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('manage.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{action('ManageUsersController@update', $member->id)}}">
      {{csrf_field()}}
      <div class="form-group">
          <input type="hidden" name="_method" value="PUT"/>
          <label for="first_name">First Name:</label>
          <input type="text" class="form-control" name="first_name" value= "{{$member->first_name}}" />
      </div>
      <div class="form-group">
          <label for="last_name">Last Name:</label>
          <input type="text" class="form-control" name="last_name" value= "{{$member->last_name}}" />
      </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value= "{{$member->email}}" />
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" name="password" value= "" >
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection
