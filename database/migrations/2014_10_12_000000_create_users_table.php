<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('code',50);
            $table->string('agency',200);
            $table->string('telephone',50)->nullable();
            $table->string('contact_person',100)->nullable();
            $table->text('address')->nullable();
            // $table->unsignedBigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreignId('user_id')->constrained('users');
            $table->integer('active')->default(0);
            $table->timestamps();
        });

        Schema::create('company_setups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->constrained('agencies');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('position')->nullable();
            $table->integer('signatory')->default(0);
            $table->integer('built_in')->default(0);
            //$table->unsignedBigInteger('company_id')->nullable()->unsigned();
            //$table->foreign('company_id')->references('id')->on('company_setups')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('company_setups')->default(1);
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('company_setups');
        Schema::dropIfExists('agencies');
    }
}
