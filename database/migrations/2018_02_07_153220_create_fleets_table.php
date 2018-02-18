<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Fleet Number');
            $table->string('Branch');
            $table->string('Description');
            $table->string('Auto Assign');
            $table->string('Total running Hours');
            $table->string('Eng On Alarm');
            $table->string('Eng Off Alarm');
            $table->string('Svc Alert');
            $table->string('VSC');
            $table->string('Last Message Time');
            $table->string('Dist to Branch');
            $table->string('Satellite ID');
            $table->string('Sat status');
            $table->string('Cellular ID');
            $table->string('Panel FW Ver');
            $table->string('App PN');
            $table->string('App Ver');
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
        Schema::dropIfExists('fleets');
    }
}
