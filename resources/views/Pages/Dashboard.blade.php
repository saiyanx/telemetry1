@extends('layouts/master')


@section ('scripts')

<!-- INCLUDE THE FOLLOWING JGAUGE REQUIREMENTS... -->
<script src="js/gauge.min.js"></script>

<script type="text/javascript">


                                        // This function is called by jQuery once the page has finished loading.
                                        $(document).ready(function()
                                        {



                                          $("#up").click(function(e){
                                            e.preventDefault();
                                            bumpVal(1);
                                          });

                                          $("#down").click(function(e){
                                            e.preventDefault();
                                            bumpVal(-1);

                                          });



                                          // change the value at runtime

                                          // This is another test function that changes the gauge value.
                                          var value = 10;
                                          function bumpVal(value)
                                          {
                                            var gaugeElement = document.getElementById('radial-Middle');

                                              console.log(gaugeElement.getAttribute('data-value'));
                                            if (value>0)
                                            {
                                              var  gaugeElementvalue=parseInt(gaugeElement.getAttribute('data-value'))+value;
                                              gaugeElement.setAttribute('data-value', gaugeElementvalue);
                                    //        gaugeElement.update({
                                      //             value: value
                                        //        });
                                              //  gaugeElement.setAttribute('data-type', 'linear-gauge');

                                            }
                                            else {

                                                //gaugeElement.value=gaugeElement.value+value;
                                                var  gaugeElementvalue=parseInt(gaugeElement.getAttribute('data-value'))+value;
                                                gaugeElement.setAttribute('data-value', gaugeElementvalue);

                                            }
                                          }

                                          window.onload = function() {
                                              // refer gauge
                                              var gauge = document.gauges[2];

                                              // this will draw red or blue circle on a gauge plate depending on
                                              // current value
                                              gauge.on('beforeNeedle', function () {
                                                  // getting canvas 2d drawing context
                                                  var context = this.canvas.context;

                                                  // we can use gauge context special 'max' property which represents
                                                  // gauge radius in a real pixels and calculate size of relative pixel
                                                  // for our drawing needs
                                                  var pixel = context.max / 100;

                                                  // step out our circle center coordinate by 30% of its radius from
                                                  // gauge center
                                                  var centerX = 30 * pixel;

                                                  // stay in center by Y-coordinate
                                                  var centerY = 0;

                                                  // use circle radius equal to 5%
                                                  var radius = 5 * pixel;

                                                  // save previous context state
                                                  context.save();

                                                  // draw circle using canvas JS API
                                                  context.beginPath();
                                                  context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);

                                                  var gradient = context.createRadialGradient(
                                                      centerX, centerY, 0,
                                                      centerX, centerY, radius);
                                                  gradient.addColorStop(0, this.options.value <= 0 ? '#aaf' : '#faa');
                                                  gradient.addColorStop(0.82, this.options.value <= 0 ? '#00f' : '#f00');
                                                  gradient.addColorStop(1, this.options.value <= 0 ? '#88a' : '#a88');

                                                  context.fillStyle = gradient;
                                                  context.fill();
                                                  context.closePath();

                                                  // restore previous context state to prevent break of
                                                  // further drawings
                                                  context.restore();
                                              });

                                              // redraw the gauge if it has been already drawn
                                              gauge.draw();
                                          }


                                          var cylinderGaugeLeft = new LinearGauge({
                                              renderTo: 'cylinderGaugeLeft',
                                              width: 120,
                                              height: 300,
                                              units: "°C",
                                              minValue: 0,
                                              startAngle: 90,
                                              ticksAngle: 180,
                                              valueBox: false,
                                              maxValue: 220,
                                              majorTicks: [
                                                  "0",
                                                  "20",
                                                  "40",
                                                  "60",
                                                  "80",
                                                  "100",
                                                  "120",
                                                  "140",
                                                  "160",
                                                  "180",
                                                  "200",
                                                  "220"
                                              ],
                                              minorTicks: 2,
                                              strokeTicks: true,
                                              highlights: [
                                                  {
                                                      "from": 100,
                                                      "to": 220,
                                                      "color": "rgba(200, 50, 50, .75)"
                                                  }
                                              ],
                                              colorPlate: "#fff",
                                              borderShadowWidth: 0,
                                              borders: false,
                                              needleType: "arrow",
                                              needleWidth: 2,
                                              needleCircleSize: 7,
                                              needleCircleOuter: true,
                                              needleCircleInner: false,
                                              animationDuration: 1500,
                                              animationRule: "linear",
                                              barWidth: 10,
                                              value: 35
                                          }).draw();

                                          var cylinderGaugeRight = new LinearGauge({
                                              renderTo: 'cylinderGaugeRight',
                                              width: 120,
                                              height: 300,
                                              units: "°C",
                                              minValue: 0,
                                              startAngle: 90,
                                              ticksAngle: 180,
                                              valueBox: false,
                                              maxValue: 220,
                                              majorTicks: [
                                                  "0",
                                                  "20",
                                                  "40",
                                                  "60",
                                                  "80",
                                                  "100",
                                                  "120",
                                                  "140",
                                                  "160",
                                                  "180",
                                                  "200",
                                                  "220"
                                              ],
                                              minorTicks: 2,
                                              strokeTicks: true,
                                              highlights: [
                                                  {
                                                      "from": 100,
                                                      "to": 220,
                                                      "color": "rgba(200, 50, 50, .75)"
                                                  }
                                              ],
                                              colorPlate: "#fff",
                                              borderShadowWidth: 0,
                                              borders: false,
                                              needleType: "arrow",
                                              needleWidth: 2,
                                              needleCircleSize: 7,
                                              needleCircleOuter: true,
                                              needleCircleInner: false,
                                              animationDuration: 1500,
                                              animationRule: "linear",
                                              barWidth: 10,
                                              value: 35
                                          }).draw();


                                        });//End of document ready



</script>


<style>
/*Slider AUTO/MAN  */
      .switch {
      position: relative;
      display: inline-block;
      width: 140px;
      height: 34px;
      }

      .switch input {display:none;}

      .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ca2222;
      -webkit-transition: .4s;
      transition: .4s;
      }

      .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
      }

      input:checked + .slider {
      background-color: #2ab934;
      }

      input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
      -webkit-transform: translateX(105px);
      -ms-transform: translateX(105px);
      transform: translateX(105px);
      }

      /*------ ADDED CSS ---------*/
      .on
      {
      display: none;
      }

      .on, .off
      {
      color: white;
      position: absolute;
      transform: translate(-50%,-50%);
      top: 50%;
      left: 50%;
      font-size: 15px;
      font-family: Verdana, sans-serif;
      }

      input:checked+ .slider .on
      {display: block;}

      input:checked + .slider .off
      {display: none;}

      /*--------- END --------*/

      /* Rounded sliders */
      .slider.round {
      border-radius: 34px;
      }

      .slider.round:before {
      border-radius: 50%;}

    #Gaugecontainer {
      margin: auto;
      width: inherit;
      height: auto;
      position: relative;
      }

     #infoi {
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: 2;
      }
      #infoi #middleGauge{
        position: absolute;
        top:20px;
        left: 320px;
      }

      #infoi #leftGauge{
        position: absolute;
        left: 55px;
        top: 70px;

      }

      #navi{
        position: relative;
        left: 0px;
        top: 0px;
        z-index: 1;
      }
      .middleButtons{
        z-index: 5;
        font-size: 0.8em;

        transform: scale(2.3,1.5);
      }
      .middleButtons #up{
        position: absolute;
        left: 175px;
        top: 190px;
      }
      .middleButtons #down{
        position: absolute;
        left: 175px;
        top: 199px;
      }

      #AutoManbtn{
        position: absolute;
        left: 25px;
        top: 2px;
      }

      #Startbtn{
        position: absolute;
        left: 800px;
        top: 2px;
      }




</style>

@endsection


@section('PanelTitle')
Gauge

@endsection

@section ('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-2">
        <div class="x_panel">
          <div class="x_title">
           <h2> Temperature</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <canvas id="cylinderGaugeLeft"></canvas>

          </div>
        </div>
      </div>

      <div id="Gaugecontainer" class="col-md-8" >
          <div id="navi">
              <img src="Images/GaugeComponents.jpg" alt ="background">
          </div>

          <div id="infoi">

            <div class="rowBtns">

            <!-- AUTO/MAN switch -->
            <div id="AutoManbtn">
            <!-- Rounded switch -->
              <label class="switch"><input type="checkbox" id="togBtn">
                <div class="slider round">
                   <span class="on">AUTO</span><span class="off">MANUAL</span><!--END-->
                </div>
              </label>
            </div>


              <!-- START/STOP switch -->
            <div id="Startbtn">
            <!-- Rounded switch -->
              <label class="switch"><input type="checkbox" id="togBtn">
                <div class="slider round">
                   <span class="on">START</span><span class="off">STOP</span><!--END-->
                </div>
              </label>
            </div>

          </div>

            <div id="leftGauge">
              <canvas data-type="radial-gauge"
                  data-width="260"
                  data-height="320"
                  data-units="°C"
                  data-title="Temperature"
                  data-min-value="-50"
                  data-max-value="50"
                  data-major-ticks="[-50,-40,-30,-20,-10,0,10,20,30,40,50]"
                  data-minor-ticks="4"
                  data-stroke-ticks="true"
                  data-highlights='[
                              {"from": 0, "to": 0, "color": "rgba(0,0, 255, .3)"},
                              {"from": 0, "to": 50, "color": "rgba(255, 0, 0, .3)"}
                          ]'
                  data-ticks-angle="205"
                  data-start-angle="40"
                  data-color-major-ticks="#ddd"
                  data-color-minor-ticks="#ddd"
                  data-color-title="#eee"
                  data-color-units="#ccc"
                  data-color-numbers="#eee"
                  data-color-plate="rgba(0,0, 0, 0)"
                  data-border-shadow-width="0"
                  data-borders="true"
                  data-needle-type="arrow"
                  data-needle-width="2"
                  data-needle-circle-size="7"
                  data-needle-circle-outer="true"
                  data-needle-circle-inner="false"
                  data-animation-duration="1500"
                  data-animation-rule="linear"
                  data-color-border-outer="rgba(0,0, 0, 0)"
                  data-color-border-outer-end="rgba(0,0, 0, 0)"
                  data-color-border-middle="rgba(0,0, 0, 0)"
                  data-color-border-middle-end="rgba(0,0, 0, 0)"
                  data-color-border-inner="rgba(0,0, 0, 0)"
                  data-color-border-inner-end="rgba(0,0, 0, 0)"
                  data-color-needle-shadow-down="#333"
                  data-color-needle-circle-outer="#333"
                  data-color-needle-circle-outer-end="#111"
                  data-color-needle-circle-inner="#111"
                  data-color-needle-circle-inner-end="#222"
                  data-value-box-border-radius="0"
                  data-color-value-box-rect="#222"
                  data-color-value-box-rect-end="#333"
                  data-font-value="Led"
                  data-font-numbers="Led"
                  data-font-title="Led"
                  data-font-units="Led"
              ></canvas>
            </div><!--leftGauge div-->

            <div id="middleGauge">
              <div class="middleButtons">
                  <div id="up">
                          <a href="#"> <i class="fa fa-caret-square-o-up"></i></a>
                  </div>
                  <div id="down">
                          <a href="#"> <i class="fa fa-caret-square-o-down"></i></a>
                  </div>
              </div>
              <canvas id="radial-Middle" data-type="radial-gauge"
                  data-width="320"
                  data-height="390"
                  data-units="°C"
                  data-title="RPM"
                  data-value="10"
                  data-min-value="-50"
                  data-max-value="50"
                  data-major-ticks="[-50,-40,-30,-20,-10,0,10,20,30,40,50]"
                  data-minor-ticks="4"
                  data-stroke-ticks="true"
                  data-highlights='[
                              {"from": -50, "to": 0, "color": "rgba(0,0, 255, .3)"},
                              {"from": 0, "to": 50, "color": "rgba(255, 0, 0, .3)"}
                          ]'
                  data-ticks-angle="225"
                  data-start-angle="67.5"
                  data-color-major-ticks="#ddd"
                  data-color-minor-ticks="#ddd"
                  data-color-title="#eee"
                  data-color-units="#ccc"
                  data-color-numbers="#eee"
                  data-color-plate="#222"
                  data-border-shadow-width="0"
                  data-borders="true"
                  data-needle-type="arrow"
                  data-needle-width="2"
                  data-needle-circle-size="7"
                  data-needle-circle-outer="true"
                  data-needle-circle-inner="false"
                  data-animation-duration="100"
                  data-animation-rule="linear"
                  data-color-border-outer="#333"
                  data-color-border-outer-end="#111"
                  data-color-border-middle="#222"
                  data-color-border-middle-end="#111"
                  data-color-border-inner="#111"
                  data-color-border-inner-end="#333"
                  data-color-needle-shadow-down="#333"
                  data-color-needle-circle-outer="#333"
                  data-color-needle-circle-outer-end="#111"
                  data-color-needle-circle-inner="#111"
                  data-color-needle-circle-inner-end="#222"
                  data-value-box-border-radius="0"
                  data-color-value-box-rect="#222"
                  data-color-value-box-rect-end="#333"
                  data-font-value="Led"
                  data-font-numbers="Led"
                  data-font-title="Led"
                  data-font-units="Led"
              ></canvas>
            </div><!--middleGauge div-->
          </div>
      </div>

<div class="col-sm-2">
  <div class="x_panel">
    <div class="x_title">
     <h2> Pressure</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <canvas id="cylinderGaugeRight"></canvas>
    </div>
  </div>
</div>


</div>
</div>


<div class="page-title">
  <div class="title_left">
    @yield('header')
  </div>
</div>

<!--Small 4 gauges start here--->
<div class="clearfix"></div>
<br/>
<!--First Small gauge--->
  <div class="col-md-3">
    <div class="x_panel">
      <div class="x_title">
       <h2> First</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p>Content</p>
      </div>
    </div>
  </div>

<!--Second Small gauge--->
  <div class="col-md-3">
    <div class="x_panel">
      <div class="x_title">
       <h2> Second</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p>Content</p>
      </div>
    </div>
  </div>

<!--Third Small gauge--->
<div class="col-md-3">
  <div class="x_panel">
    <div class="x_title">
     <h2> Third</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p>Content</p>
    </div>
  </div>
</div>

<!--Fourth Small gauge--->
<div class="col-md-3">
  <div class="x_panel">
    <div class="x_title">
     <h2> Fourth</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <canvas data-type="radial-gauge"
              data-value="20"
              data-width="200"
              data-height="200"
              data-bar-width="20"
              data-bar-shadow="5"
              data-color-bar-progress="rgba(50,200,50,.75)"
              data-needle="false"
              data-stroke-ticks = "false"

      ></canvas>
    </div>
  </div>
</div>

@endsection
