<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('crew_no')->nullable();
            $table->text('image_path')->nullable();
            $table->date('application_date');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('contact_address');
            $table->string('email',150)->unique();
            $table->string('telephone')->nullable();
            $table->string('password')->nullable();


            $table->string('no_bldg')->nullable();
            $table->string('street_barangay')->nullable();
            $table->string('municipality_city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('mobile_no')->nullable();
            $table->unsignedBigInteger('country_id')->nullable()->unsigned();
            // //$table->foreignId('country_id')->nullable()->constrained();
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            //$table->index('country_id')->nullable();
            //$table->foreign('country_id')->nullable()->references('id')->on('countries')->onDelete('cascade');
            $table->date('birth_date')->nullable();
            $table->text('birth_place')->nullable();
            $table->string('gender',10)->nullable();
            $table->string('civil_status',10)->nullable();
            $table->string('height',10)->nullable();
            $table->string('weight',10)->nullable();
            $table->string('blood_type',3)->nullable();
            $table->string('eye_color',20)->nullable();
            $table->string('religion',50)->nullable();
            $table->string('nationality',50)->nullable();
            $table->text('foreign_language')->nullable();
            $table->string('race',50)->nullable();


            $table->string('kin_fullname',100)->nullable();
            $table->date('kin_birth_date')->nullable();
            $table->string('kin_relationship',20)->nullable();
            $table->text('kin_address')->nullable();
            $table->string('kin_telephone',20)->nullable();
            $table->string('kin_hp_no',20)->nullable();


            $table->string('cover_all')->nullable();
            $table->string('safety_shoes')->nullable();
            $table->string('white_polo')->nullable();
            $table->string('black_pants')->nullable();
            $table->string('winter_jacket')->nullable();
            $table->string('winter_pants')->nullable();
            $table->string('rain_coat')->nullable();

            $table->string('sss_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('pagibigid_no')->nullable();
            $table->string('psu_no')->nullable();

            $table->date('psu_issuance_date')->nullable();
            $table->string('nbi_no')->nullable();
            $table->date('nbi_validity')->nullable();

            $table->integer('member_type')->nullable();
            $table->string('remarks')->nullable();
            $table->string('recommended_by')->nullable();
            $table->string('other_info')->nullable();

            $table->string('fathers_name',100)->nullable();
            $table->string('fathers_occupation',100)->nullable();
            $table->text('fathers_address')->nullable();

            $table->string('mothers_name',100)->nullable();
            $table->string('mothers_occupation',100)->nullable();
            $table->text('mothers_address')->nullable();


            $table->string('spouse_first_name',100)->nullable();
            $table->string('spouse_middle_name',100)->nullable();
            $table->string('spouse_last_name',100)->nullable();
            $table->date('spouse_married_date')->nullable();
            $table->date('spouse_birth_date')->nullable();
            $table->text('spouse_birth_place')->nullable();
            $table->text('spouse_occupation')->nullable();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('crews');
    }
}
