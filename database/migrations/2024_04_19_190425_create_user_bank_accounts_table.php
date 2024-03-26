<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('account_name');
            $table->string('swift_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_number');
            $table->string('iban');
            $table->text('front_media')->nullable();
            $table->text('back_media')->nullable();
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
        Schema::dropIfExists('user_bank_accounts');
    }
};
