<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');   
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');   
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('category_id')->nullable(); 
            $table->string('position')->nullable();
            $table->text('roles')->nullable();
            $table->string('function')->nullable();
            $table->string('salary')->nullable();
            $table->integer('experience')->default(0);
            $table->string('course')->nullable();
            $table->string('specialization')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('preferences')->nullable(); 
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('number_of_vacancy')->nullable();
            $table->string('type')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('last_date')->nullable();
            $table->integer('status')->nullable();         
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
        Schema::dropIfExists('jobs');
    }
}
