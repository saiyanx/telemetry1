@extends('layouts/master')

@section('header')

  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Users</h2>
          </div>
          
          <div class="pull-right">
              <a class="btn btn-success" href="{{ route('manage.create') }}"> Create New User</a>
          </div>
      </div>
  </div>
@endsection

@section ('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered bg-light ">
      <thead class="bg-dark">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($members as $member)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $member->first_name}}</td>
        <td>{{ $member->email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('manage.show',$member->id) }}">Details</a>
            <a class="btn btn-primary" href="{{ route('manage.edit', $member->id) }}">Edit</a>

            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#DeleteUserModal">
                <i class="fa fa-trash"></i> Delete
            </button>
            @include('manage/Delete_confirm')

        </td>
    </tr>
    @endforeach
  </tbody>
    </table>
    {{  $members->render() }}
@endsection
