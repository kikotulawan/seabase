<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_education', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('crew_id')->unsigned();
            // $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->foreignId('crew_id')->constrained('crews');
            $table->string('course_degree',100);
            $table->string('school_name',100);
            $table->date('attendance_date');
            $table->foreignId('user_id')->nullable()->constrained('users');
            //$table->unsignedBigInteger('user_id')->nullable()->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('crew_education');
    }
}
