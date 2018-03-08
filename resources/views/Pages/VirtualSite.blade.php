@extends('layouts/master')

@section('PanelTitle')
Virtual Site
@endsection

@section ('content')
<div class="dropdown">
     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose a site
     <span class="caret"></span></button>
     <ul class="dropdown-menu">
       <li><a href="#">Create New Site</a></li>
       <li><a href="#">CSS</a></li>
       <li><a href="#">JavaScript</a></li>
     </ul>
</div>

@endsection
