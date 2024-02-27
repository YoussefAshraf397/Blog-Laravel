<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_place', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('place_id');
            $table->tinyInteger('num')->nullable();
        });

        Schema::table('attribute_place', function (Blueprint $table) {
            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('place_id')
                ->references('id')
                ->on('places')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_place');
    }
};
