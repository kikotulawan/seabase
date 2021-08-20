<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principal_id')->unsigned();
            $table->foreign('principal_id')->references('id')->on('principals')->onDelete('cascade');
            $table->text('image_path')->nullable();
            $table->string('code',50);
            $table->string('vessel_name',50)->unique();
            $table->string('call_sign',50)->unique();
            $table->unsignedBigInteger('vessel_type_id')->unsigned();
            $table->foreign('vessel_type_id')->references('id')->on('vessel_types')->onDelete('cascade');
            $table->unsignedBigInteger('flag_id')->unsigned();
            $table->foreign('flag_id')->references('id')->on('flag_state_documents')->onDelete('cascade');
            $table->unsignedBigInteger('trade_route_id')->nullable()->unsigned();
            $table->foreign('trade_route_id')->references('id')->on('trade_routes')->onDelete('cascade');
            $table->string('manager',100)->nullable();
            $table->string('contact_person',100)->nullable();
            $table->string('contact_person_no',100)->nullable();
            //$table->string('salary_wage_scale',20);
            $table->string('ex_flag',100)->nullable();
            $table->string('port_of_registry',100)->nullable();
            $table->string('year_built',100)->nullable();
            $table->string('owner_address',100)->nullable();
            $table->string('owner_name',100)->nullable();
            $table->string('email_address',100)->nullable();
            //$table->string('ex_name',100)->nullable();
            $table->string('official_number',100)->nullable();
            $table->string('imo_number',100)->nullable();
            $table->string('main_engine',100)->nullable();
            $table->integer('capacity')->default(0);
            $table->integer('propulsion_power')->default(0);
            $table->string('grt',50)->nullable();
            $table->string('dwt',50)->nullable();
            $table->string('classification_society',100)->nullable();
            $table->string('nrt',100)->nullable();
            $table->string('particulars',100)->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cba',100)->nullable();
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
        Schema::dropIfExists('vessels');
    }
}
