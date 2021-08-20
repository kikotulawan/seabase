<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('vessel_id')->unsigned();
            $table->foreign('vessel_id')->references('id')->on('vessels')->onDelete('cascade');
            $table->unsignedBigInteger('incident_rank_id')->unsigned();
            $table->foreign('incident_rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->date('incident_date');
            $table->date('repatriation_date');
            $table->string('description',100);
            $table->string('incident_type');
            $table->string('disability');
            $table->date('pronounced_date');
            $table->date('settled_date');
            $table->string('status',20);
            $table->string('remarks');
            $table->unsignedBigInteger('incident_clinic_id')->unsigned();
            $table->foreign('incident_clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('crew_incidents');
    }
}
