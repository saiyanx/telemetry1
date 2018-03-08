@extends('layouts.master')

@section('header')
  <h2>Admin Dashboard</h2>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table table-bordered bg-light ">
                    <thead class="bg-dark" style="color: white">
                         <th>User ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>E-Mail</th>
                         <th>Engineer</th>
                         <th>Supervisor</th>
                         <th>Administrator</th>
                         <th></th>
                         </thead>
                         <tbody>
                         @foreach($users as $user)
                             <tr>
                                 <form method="POST" action="{{ route('admin.assign') }}" >
                                    <input type="hidden" name="_method" value="POST"/>
                                     {{ csrf_field() }}
                                     <td>{{ $user->id }} <input type="hidden" name="id" value="{{ $user->id }}"</td>
                                     <td>{{ $user->first_name }}</td>
                                     <td>{{ $user->last_name }} </td>
                                     <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                     <td><input type="checkbox" name="role_engr" {{ $user->hasRole('Engineer') ? 'checked' : '' }} ></td>
                                     <td><input type="checkbox" name="role_supervisor" {{ $user->hasRole('Supervisor') ? 'checked' : '' }} ></td>
                                     <td><input type="checkbox" name="role_admin"  {{ $user->hasRole('Administrator') ? 'checked' : '' }} ></td>

                                     <td><button class="btn btn-primary" type="submit">Assign Roles</button></td>
                                 </form>

                             </tr>
                         @endforeach

                         </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
