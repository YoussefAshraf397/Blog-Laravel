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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();

            $table->string('name', 100)->nullable();

            $table->string('country_code', 10)->nullable();
            $table->string('phone', 30)->nullable()->unique();
            $table->string('password')->nullable();

            $table->char('type', 15);
            $table->string('email')->nullable()->unique();
            $table->char('status', 15);

            $table->string('otp')->nullable();
            $table->timestamp('otp_sent_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->char('gender', 10)->nullable();
            $table->date('dob')->nullable();
            $table->text('profile_image')->nullable();

            $table->text('provider_id')->nullable();
            $table->char('provider_type', 15)->nullable();

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
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
        Schema::dropIfExists('users');
    }
}
