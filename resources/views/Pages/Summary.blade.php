@extends('layouts/master')

@section ('scripts')
<script>

    //Set options, for slides
    //Add initial active class

     $(document).ready(function(){
      var $chk = $("#checkboxes input:checkbox"); // cache the selector
      var $tbl = $("#myTable");

      $chk.prop('checked', true); // check all checkboxes when page loads

      $chk.click(function () {
          var colToHide = $tbl.find("." + $(this).attr("name"));
          $(colToHide).toggle();
      });

  });//end of document.ready

  var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

//Function for hiding columns
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

//Function for sorting
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


</script>
@endsection

@section('header')
<h2>Fleet Summary</h2>
@endsection

@section ('content')


<!-- Row start -->
<div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Engine RPM..">

 <div class="float-right">
    <form>
      <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
          <select>
            <option>Show/Hide Columns</option>
          </select>
          <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
          <label for="one">
            <input type="checkbox" id="one" name="A"/>Engine RPM</label>
          <label for="two">
            <input type="checkbox" id="two" name="B"/>Engine Lube Oil Temperature</label>
          <label for="three">
            <input type="checkbox" id="three" name="C"/>Low Lube Oil Level</label>
        </div>
      </div>
    </form>
  </div>
</div>

<br>
<br>

  <div class="table-wrapper-2" >
     <table id="myTable" class="table-bordered table-hover">
      <thead>
       <tr>
            <th onclick="sortTable(0)" class="A">Engine RPM</th>
            <th onclick="sortTable(1)" class="B">Engine Lube Oil Temperature</th>
            <th onclick="sortTable(2)" class="C">Low Lube Oil Level</th>
            <th>Engine Lube Oil Pressure</th>
            <th>Engine Coolant Level</th>
            <th>Engine Warmup Heater</th>
            <th>Engine Fuel Level</th>
            <th>Engine Ignition Coil</th>
            <th>Engine Air Fuel Switch</th>
            <th>Engine Battery Volts</th>
            <th>Engine Gearbox Temperature</th>
            <th>Engine Exhaust Analyzer</th>
            <th>Pump Temperature</th>
            <th>Pump Vibration</th>
            <th>Discharge Water Flow</th>
            <th>Discharge Pressure</th>
            <th>Suction Pressure</th>
            <th>Tank Level-1</th>
            <th>Tank Level-2</th>
            <th>Actuator Open Command</th>
            <th>Actuator Close Command</th>
            <th>Warning Horn</th>
            <th>Exciter Enable Command</th>
            <th>Crank Start Command</th>
            <th>Engine Shutdown Command</th>
            <th>PreShutdown Signal</th>
            <th>Auto/Manual Switch</th>
       </tr>
     </thead>
     <body>



       @foreach($fleets as $fleet)
        <tr>
            <td><a href="/gauge">{{ $fleet->Engine_RPM}}</a></td>
            <td>{{ $fleet->Engine_Lube_Oil_Temperature}}</td>
            <td>{{ $fleet->Low_Lube_Oil_Level}}</td>
            <td>{{ $fleet->Engine_Lube_Oil_Pressure}}</td>
            <td>{{ $fleet->Engine_Coolant_Level}}</td>
            <td>{{ $fleet->Engine_Warmup_Heater}}</td>
            <td>{{ $fleet->Engine_Fuel_Level}}</td>
            <td>{{ $fleet->Engine_Ignition_Coil}}</td>
            <td>{{ $fleet->Engine_Air_Fuel_Switch}}</td>
            <td>{{ $fleet->Engine_Battery_Volts}}</td>
            <td>{{ $fleet->Engine_Gearbox_Temperature}}</td>
            <td>{{ $fleet->Engine_Exhaust_Analyzer}}</td>
            <td>{{ $fleet->Pump_Temperature}}</td>
            <td>{{ $fleet->Pump_Vibration}}</td>
            <td>{{ $fleet->Discharge_Water_Flow}}</td>
            <td>{{ $fleet->Discharge_Pressure}}</td>
            <td>{{ $fleet->Suction_Pressure}}</td>
            <td>{{ $fleet->Tank_Level1}}</td>
            <td>{{ $fleet->Tank_Level2}}</td>
            <td>{{ $fleet->Actuator_Open_Command}}</td>
            <td>{{ $fleet->Actuator_Close_Command}}</td>
            <td>{{ $fleet->Warning_Horn}}</td>
            <td>{{ $fleet->Exciter_Enable_Command}}</td>
            <td>{{ $fleet->Crank_Start_Command}}</td>
            <td>{{ $fleet->Engine_Shutdown_Command}}</td>
            <td>{{ $fleet->PreShutdown_Signal}}</td>
            <td>{{ $fleet->AutoManual_Switch}}</td>
        </tr>
       @endforeach


   </body>
   </table>
  </div>

@endsection
