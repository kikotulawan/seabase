<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewAllotteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_allottees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('account_name',100);
            $table->string('relationship',50);
            $table->string('account_number',100);
            $table->double('allotment')->default(0);
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
        Schema::dropIfExists('crew_allottees');
    }
}
