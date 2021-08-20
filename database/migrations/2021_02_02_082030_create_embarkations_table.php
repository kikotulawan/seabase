<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbarkationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarkations', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->nullable();
            $table->foreignId('vessel_id')->constrained('vessels');
            // $table->unsignedBigInteger('vessel_id')->unsigned();
            // $table->foreign('vessel_id')->references('id')->on('vessels')->onDelete('cascade');
            // $table->unsignedBigInteger('departure_id')->unsigned();
            // $table->foreign('departure_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreignId('departure_id')->constrained('airports');
            $table->date('departure_date');
            // $table->unsignedBigInteger('embarkation_id')->unsigned();
            // $table->foreign('embarkation_id')->references('id')->on('seaports')->onDelete('cascade');
            $table->foreignId('embarkation_id')->constrained('seaports');
            $table->date('embarkation_date');

            // $table->unsignedBigInteger('arrival_id')->unsigned();
            // $table->foreign('arrival_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreignId('arrival_id')->nullable()->constrained('airports');
            $table->date('arrival_date')->nullable();


            //$table->unsignedBigInteger('disembarkation_id')->nullable()->unsigned();
            //$table->foreign('disembarkation_id')->references('id')->on('seaports')->onDelete('cascade');
            $table->foreignId('disembarkation_id')->nullable()->constrained('seaports');
            $table->date('disembarkation_date');

            $table->integer('contract_duration');
            $table->string('point_of_hire',100);
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->constrained('users');
            // $table->unsignedBigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses');
            $table->unsignedBigInteger('agency_id')->default(1);
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
        Schema::dropIfExists('embarkations');
    }
}
