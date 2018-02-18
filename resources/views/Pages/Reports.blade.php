@extends('layouts/master')

@section ('content')

<h1>Reports</h1>
<hr><br>
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
</div>
<button type="submit" class="btn btn-primary">Export Data</button>
</form>



@endsection
