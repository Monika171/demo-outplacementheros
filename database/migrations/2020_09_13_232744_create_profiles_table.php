<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->string('dob');
            $table->string('gender');  
            $table->string('phone_number')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('experience_years')->default(0);
            $table->integer('experience_months')->nullable();
            $table->string('recent_company')->nullable();
            $table->string('recent_designation')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('function')->nullable();
            $table->string('industry')->nullable();
            $table->string('preferred_location')->nullable();
            $table->integer('salary_in_lakhs')->default(0);
            $table->integer('salary_in_thousands')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('notice_period')->nullable();
            $table->mediumText('preferences')->nullable();
            $table->string('resume')->nullable();
            $table->string('profile_pic')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
