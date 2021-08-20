<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('training_course_id');
            $table->foreign('training_course_id')->references('id')->on('training_courses')->onDelete('cascade');
            $table->unsignedBigInteger('training_center_id');
            $table->foreign('training_center_id')->references('id')->on('training_centers')->onDelete('cascade');
            $table->string('certificate_number',100);
            $table->string('stcw_code',100)->nullable();
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->string('issued_by',100)->nullable();
            $table->string('place_issued',150)->nullable();
            $table->boolean('mlc')->default(0);
            $table->text('file_path')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
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
        Schema::dropIfExists('crew_trainings');
    }
}
