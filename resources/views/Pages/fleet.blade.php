@extends('layouts/master')

@section ('header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Fleet</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="#"> Map View</a>
        </div>
    </div>
</div>
@endsection

@section ('content')

<div style="overflow-y:scroll">
  <div class="table-responsive" >
    <div class="table-wrapper-2" >
       <table id="myTable" class="table-bordered table-hover">
        <thead>
       <tr>
         <?php
         //Get table headers and store it in columns array
          $columns = DB::connection()->getSchemaBuilder()->getColumnListing("fleets");
          foreach($columns as $column):?>

            <th>   <?php echo $column; ?> </th>

          <?php endforeach; ?>
       </tr>
     </thead>
     <body>
       <?php
       //Get table $rows from database
        $columndata = DB::table('fleets')->get();
        ?>


        <?php  foreach($columndata as $data):?>
            <tr>
                <?php foreach($columns as $column):?>
                  <td>   <?php echo $data->$column; ?> </td>
              <?php endforeach; ?>
            </tr>
         <?php endforeach; ?>


    </body>
   </table>
  </div>
</div>
@endsection
