<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->mediumInteger('country_id');
            $table->char('country_code', 2)->nullable();
            $table->string('fips_code', 255)->nullable();
            $table->string('iso2', 255)->nullable();
            $table->timestamps();
            $table->tinyInteger('flag')->nullable();
            $table->string('wikiDataId', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
