<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbarkationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarkation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('embarkation_id')->constrained('embarkations');
            $table->foreignId('crew_id')->constrained('crews');
            $table->foreignId('rank_id')->constrained('ranks');
            $table->date('sign_off')->nullable();
            $table->string('reason_of_leaving',200)->nullable();
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
        Schema::dropIfExists('embarkation_details');
    }
}
