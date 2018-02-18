@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>{{ ucfirst($member->first_name)." ".ucfirst($member->last_name)}} details</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('manage.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-9 col-lg-9 ">
                 <table class="table table-condensed">
                   <tbody>
                     <tr>
                       <td><strong>First Name:</strong></td>
                       <td> {{ ucfirst($member->first_name)}}</td>
                     </tr>
                     <tr>
                       <td><strong>Last name:</strong></td>
                       <td>{{ ucfirst($member->last_name)}}</td>
                     </tr>
                     <tr>
                       <td><strong>Email:</strong></td>
                       <td>{{ $member->email}}</td>
                     </tr>
                      <tr>
                       <td><strong>Designation:</strong></td>
                       <td>{{ $member->designation}}</td>
                     </tr>
                       <tr>
                       <td><strong>Phone number:</strong></td>
                       <td>{{ $member->phone_number}}</td>
                     </tr>
                     <tr>
                       <td><strong>Role(s):</strong></td>
                       <form class="form-inline">
                         <td>{{ $member->hasRole('Engineer') ? 'Engineer' : '' }}
                             {{ $member->hasRole('Supervisor')? ' Supervisor' : '' }}
                             {{ $member->hasRole('Administrator')? ' Administrator' : '' }}</td>
                       </form>
                     </tr>


                   </tbody>
                 </table>
    </div>
  </div>
@endsection
