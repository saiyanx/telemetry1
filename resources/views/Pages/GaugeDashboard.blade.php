@extends('layouts/master')


@section ('scripts')

<!-- INCLUDE THE FOLLOWING JGAUGE REQUIREMENTS... -->
<link rel="stylesheet" href="css/jgauge.css" type="text/css" /> <!-- CSS for jGauge styling. -->
<!--[if IE]><script type="text/javascript" language="javascript" src="js/excanvas.min.js"></script><![endif]--> <!-- Extends canvas support to IE. (Possibly buggy, need to look into this.) -->
<script language="javascript" type="text/javascript" src="js/jquery-1.4.2.min.js"></script> <!-- jQuery JavaScript library. -->
<script language="javascript" type="text/javascript" src="js/jQueryRotate.min.js"></script> <!-- jQueryRotate plugin used for needle movement. -->
<script language="javascript" type="text/javascript" src="js/jgauge-0.3.0.a3.js"></script> <!-- jGauge JavaScript. -->
<script src="js/raphael-2.1.4.min.js"></script><!--justgage-->
<script src="js/justgage.js"></script> <!--justgage-->
<style>

  #g1 {
    width:220px;
    height:150px;
    display: inline-block;
    position: relative;
    margin-left: 20%;
    margin-right: 20%;
    transform: rotateZ(-90deg);
  }

  #container {
    max-width: 100%;
    height: auto;
    position: relative;
    }

   #infoi {
    position: absolute;
    text-align: center;
    top:0;
    left: 340px;
    }

    #navi{
    position: absolute;
  /*  text-align: center;*/
    top:0;
    left: 0px;
    right: 0px;
    }



</style>

@endsection

@section('header')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Console</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href='/summary'> Back</a>
        </div>
    </div>
</div>

@endsection


@section ('content')

			<div id="container">
				<div id="navi">
          					<div id="jGaugeDemo3"></div>
				</div>
				<div id="infoi">
					<!-- These DIVs are the placeholders for our example jGauges -->
              <img class="clickMap" src="images/dashboard.png" width="840" height="480" alt="Gauge"
                usemap="#planetmap">

              <map name="planetmap">
                <area class="increase" alt="Increase" title="Increase" href="" coords="800,420,22" shape="circle">
                <area class="decrease" alt="Decrease" title="Decrease" href="" coords="750,420,22" shape="circle">
                <area alt="Settings" title="Settings" href="" coords="45,436,32" shape="circle">
                <area alt="Auto/Man" title="Auto/Man" href="" coords="750,58,22" shape="circle">
                <area alt="Run/Stop" title="Run/Stop" href="#" coords="800,58,22" shape="circle">
              </map>

				</div>
			</div><!--Container-->

			<!-- Clear the float -->
			<div class="break"></div>

			<!-- This script block defines the gauge parameters and includes some simple
			     functions to test the jGauge with (the above links use this) -->
			<script type="text/javascript">

				// DEMOGAUGE3 - This gauge is more complex to show a completely different style and is updated with random values...
				var demoGauge3 = new jGauge(); // Create a new jGauge.
				demoGauge3.id = 'jGaugeDemo3'; // Link the new jGauge to the placeholder DIV.
				demoGauge3.autoPrefix = autoPrefix.si; // Use SI prefixing (i.e. 1k = 1000).
				demoGauge3.imagePath = '';
				demoGauge3.segmentStart = -270;
				demoGauge3.segmentEnd = 45;
				demoGauge3.width = 840;
				demoGauge3.height = 480;
				demoGauge3.needle.imagePath = 'Images/jgauge_needle_taco.png';
				demoGauge3.needle.xOffset = 283;//set position
				demoGauge3.needle.yOffset = -25;
				demoGauge3.needle.limitAction = limitAction.clamp;
                                demoGauge3.label.yOffset = 0;
																demoGauge3.label.xOffset = 0;
                                demoGauge3.label.color = '#ff0000';
                                demoGauge3.label.precision = 0; // 0 decimals (whole numbers).
				demoGauge3.label.suffix = 'RPM'; // Make the value label watts.
				demoGauge3.ticks.labelRadius = 102;
                                demoGauge3.ticks.labelColor = '#0ce';
                                demoGauge3.ticks.start = 0;
                                demoGauge3.ticks.end = 10;
                                demoGauge3.ticks.count = 10;
                                demoGauge3.ticks.color = 'rgba(0, 0, 0, 0)';
																demoGauge3.range.radius = 130;
																demoGauge3.range.thickness = 36;
																demoGauge3.range.start = -23;
																demoGauge3.range.end = 37;
																demoGauge3.range.color = 'rgba(255, 32, 0, 0.4)';


																				// This is another test function that changes the gauge value.
																				function bumpVal(value)
																				{
																					if (value>0)
																					{
																						if (demoGauge3.value<10)
																					  {demoGauge3.setValue(demoGauge3.value + (value));
																						g1.refresh(value);
																						}
																					}
																					else {
																						if (demoGauge3.value>0)
																						{
																							demoGauge3.setValue(demoGauge3.value + value);
																						}
																					}
																				}

																				//JustGage
																				var g1;

																				window.onload = function(){
																					var g1 = new JustGage({
																						id: "g1",
																						value: getRandomInt(0, 100),
																						min: 0,
																						max: 100,
																						title: "Minimal",
																						label: "",
																						hideMinMax: true,
																						gaugeColor: "#fff",
																						levelColors: ["#ff0000"],
																						hideInnerShadow: true,
																						startAnimationTime: 1,
																						donutStartAngle: 250,
																						gaugeWidthScale:0.5,
																						width:50,
																						startAnimationType: "bounce",
																						refreshAnimationTime: 1,
																						refreshAnimationType: "linear"
																					});

																				};

				// This function is called by jQuery once the page has finished loading.
				$(document).ready(function()
				{

					demoGauge3.init(); // Put the jGauge on the page by initializing it.

					// Configure demoGauge3 for random value updates.
					demoGauge3.setValue(0);

					$(".increase").click(function(e){
			      e.preventDefault();
						bumpVal(1);
					});

					$(".decrease").click(function(e){
						e.preventDefault();
						bumpVal(-1);
					});

				});//End of document ready


			</script>

			<noscript><div id="noscript-warning"><img src="img/no-script.gif" alt="jGauge requires JavaScript enabled" width="220" height="17" /></div></noscript>


@endsection
