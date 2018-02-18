@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Add New User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('manage.index') }}"> Back</a>
            </div>
        </div>
    </div>
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
    <form method="post" action="{{action('ManageUsersController@store')}}">
      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="first_name">First Name:</label>
          <input type="text" class="form-control" name="first_name"/>
      </div>
      <div class="form-group">
          <label for="last_name">Last Name:</label>
          <input type="text" class="form-control" name="last_name"/>
      </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email"/>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" name="password"></textarea>
    </div>
    <div class="form-group">
      <label for="sel2">Select user Role(s):</label>
      <select multiple class="form-control" id="sel2" name = "roles[]">
        <option>Engineer</option>
        <option>Supervisor</option>
        <option>Administrator</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
