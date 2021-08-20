<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewChildrenBenificiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_children_benificiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('relationship',20);
            $table->string('gender',10);
            $table->date('birth_date');
            $table->text('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->string('type',5);
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
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
        Schema::dropIfExists('crew_children_benificiaries');
    }
}
