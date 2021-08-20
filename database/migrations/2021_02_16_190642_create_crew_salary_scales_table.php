<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewSalaryScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_salary_scales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->foreignId('vessel_salary_scale_id')->nullable()->constrained('vessel_salary_scales');
            //$table->unsignedBigInteger('vessel_salary_scale_id')->nullable()->unsigned();
            //$table->foreign('salary_scale_detail_id')->references('id')->on('salary_scale_details')->onDelete('cascade');
            $table->unsignedBigInteger('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->string('description',50);
            $table->double('monthly')->default(0);
            $table->double('daily')->default(0);
            $table->integer('percentage')->nullable()->default(0);
            $table->integer('days')->nullable()->default(0);
            $table->text('remarks')->nullable();
            $table->boolean('add_to_total')->default(0);
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
        Schema::dropIfExists('crew_salary_scales');
    }
}
