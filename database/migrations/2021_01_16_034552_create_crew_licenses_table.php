<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_licenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('license_id');
            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
            $table->string('license_number',100);
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->string('issued_by',100)->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('crew_licenses');
    }
}
