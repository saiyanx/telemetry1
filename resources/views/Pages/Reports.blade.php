@extends('layouts/master')

@section('header')
<h2>Reports</h2>
@endsection

@section ('content')

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

<form method="GET" action="{{route('export.file')}}">
  {{csrf_field()}}
<div class="form-group">
  <label for="sel2"><strong>Fleet number:</strong></label>
  <select multiple class="form-control" id="sel2" name = "fleet[]">

      <option>All</option>

    <?php
    //Get table $rows from database
     $columns = DB::table('hardware_parameters')->select('Engine_RPM')->distinct()->get();
      $name='Engine_RPM';
     ?>

             <?php foreach($columns as $column):?>
               <option>   <?php echo $column->$name; ?> </option>
           <?php endforeach; ?>

  </select>

<br>  <label for="sel2"><strong>Select File format:</strong></label><br>
  <input type="checkbox" name="format" value="xlsx" checked>Excel(.xlsx)<br>
  <input type="checkbox" name="format" value="PDF">PDF<br>

</div>
<button type="submit" class="btn btn-primary">Export Data</button>
</form>



@endsection
