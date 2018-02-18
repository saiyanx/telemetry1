<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_summary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Fleet Number');
            $table->string('Location');
            $table->string('Date');
            $table->string('Time');
            $table->string('EngHrs');
            $table->string('Key Switch');
            $table->string('Eng status');
            $table->string('Eng Temp');
            $table->string('Eng RPM');
            $table->string('Batt Volt');
            $table->string('OilPress');
            $table->string('Fuel Rate');
            $table->string('Fuel level');
            $table->string('Eng Load');
            $table->string('Eng Soot');
            $table->string('Disch PressA');
            $table->string('Disch PressB');
            $table->string('Flow Rate');
            $table->string('Sump Level');
            $table->string('Alarms');
            $table->string('Error');
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
        Schema::dropIfExists('fleet_summary');
    }
}
