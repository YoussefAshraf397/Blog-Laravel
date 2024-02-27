<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('property_type_id')->nullable();
            $table->unsignedBigInteger('place_type_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->json('name');
            $table->json('details');
            $table->json('cancellation_policy');


            $table->char('status', 15);

            $table->float('price_per_day_on_week_days');
            $table->float('price_per_day_on_week_end');
            $table->float('custom_commission');

            $table->boolean('requires_professional_photographer');
            $table->boolean('accepts_reservations_automatically');
            $table->boolean('accepts_promocodes')->default(false);
            $table->boolean('support_overnight')->default(false);
            $table->boolean('can_use_additional_services')->default(true);
            $table->boolean('is_accepting_additional_service')->default(true);
            $table->boolean('is_active')->default(true);

            $table->string('category_group')->default('C');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('places', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('property_type_id')
                ->references('id')
                ->on('property_types')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreign('place_type_id')
                ->references('id')
                ->on('place_types')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
};
