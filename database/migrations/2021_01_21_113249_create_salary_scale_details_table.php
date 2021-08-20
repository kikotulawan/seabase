<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryScaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_scale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salary_scale_id')->unsigned();
            $table->foreign('salary_scale_id')->references('id')->on('salary_scales')->onDelete('cascade');
            $table->unsignedBigInteger('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->string('description',100);
            $table->double('monthly')->default(0);
            $table->double('daily')->default(0);
            $table->integer('percentage')->nullable()->default(0);
            $table->integer('days')->nullable()->default(0);
            $table->string('remarks',100)->nullable();
            $table->integer('add_to_total')->default(0);
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
        Schema::dropIfExists('salary_scale_details');
    }
}
