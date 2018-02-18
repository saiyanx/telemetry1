@extends('layouts/master')
@section ('content')

<?php/*    {{ Form::open(['method' => 'DELETE','route' => ['members.destroy', $member->id],'style'=>'display:inline']) }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {{ Form::close() }}
*/?>
<div class="container">
  <label for="email"><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="uname" required>

  <label for="password"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
</div>
<form action="{{action('ManageUsersController@store', [uname, psw])}}" method="post">
  {{csrf_field()}}
  <input name="_method" type="hidden" value="DELETE">
  <button type="submit" class="btn btn-danger">Yes, Delete</button>
</form>

<form action="{{action('ManageUsersController@destroy', $member->id)}}" method="post">
  {{csrf_field()}}
  <input name="_method" type="hidden" value="DELETE">
  <button class="btn btn-danger" type="submit">Delete</button>
</form>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Members CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('manage.create') }}"> Create New Member</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($members as $member)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $member->name}}</td>
        <td>{{ $member->email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['members.destroy', $member->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $members->render() !!}
@endsection
