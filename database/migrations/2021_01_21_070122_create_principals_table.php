<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principals', function (Blueprint $table) {
            $table->id();
            $table->text('image_path')->nullable();
            $table->string('code',20);
            $table->string('principal',150);
            $table->text('address')->nullable();
            $table->unsignedBigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('telephone',50)->nullable();
            $table->string('fax',50)->nullable();
            $table->string('email',150)->unique();
            $table->string('accreditation_number',100)->nullable();
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->date('license_expiry_date');
            $table->string('cba',100)->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('principals');
    }
}
