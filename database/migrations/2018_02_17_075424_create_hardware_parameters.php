<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
              Schema::create('hardware_parameters', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('Engine_RPM');
                    $table->string('Engine_Lube_Oil_Temperature');
                    $table->string('Low_Lube_Oil_Level');
                    $table->string('Engine_Lube_Oil_Pressure');
                    $table->string('Engine_Coolant_Level');
                    $table->string('Engine_Warmup_Heater');
                    $table->string('Engine_Fuel_Level');
                    $table->string('Engine_Ignition_Coil');
                    $table->string('Engine_Air_Fuel_Switch');
                    $table->string('Engine_Battery_Volts');
                    $table->string('Engine_Gearbox_Temperature');
                    $table->string('Engine_Exhaust_Analyzer');
                    $table->string('Pump_Temperature');
                    $table->string('Pump_Vibration');
                    $table->string('Discharge_Water_Flow');
                    $table->string('Discharge_Pressure');
                    $table->string('Suction_Pressure');
                    $table->string('Tank_Level1');
                    $table->string('Tank_Level2');
                    $table->string('Actuator_Open_Command');
                    $table->string('Actuator_Close_Command');
                    $table->string('Warning_Horn');
                    $table->string('Exciter_Enable_Command');
                    $table->string('Crank_Start_Command');
                    $table->string('Engine_Shutdown_Command');
                    $table->string('PreShutdown_Signal');
                    $table->string('AutoManual_Switch');

                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardware_parameters');
    }
}
