<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id')->unsigned();
            $table->foreign('crew_id')->references('id')->on('crews')->onDelete('cascade');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->string('document_number',100);
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->string('issued_by',100)->nullable();
            $table->string('place_issued',150)->nullable();
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
        Schema::dropIfExists('crew_documents');
    }
}
