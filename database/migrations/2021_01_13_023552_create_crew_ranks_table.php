<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_ranks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('crew_ranks');
    }
}
