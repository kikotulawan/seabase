<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipalContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principal_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_id')->unsigned();
            $table->foreign('principal_id')->references('id')->on('principals')->onDelete('cascade');
            $table->string('name',100);
            $table->string('position',100)->nullable();
            $table->string('contact_number',100);
            $table->string('email_address',100);
            $table->integer('active')->default(0)->nullable();
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
        Schema::dropIfExists('principal_contacts');
    }
}
