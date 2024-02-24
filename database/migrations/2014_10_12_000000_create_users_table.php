1<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('service_id')->nullable();
            $table->integer('profile_type')->nullable();
            $table->string('phone_number', 30)->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('gender')->nullable();
            $table->text('proerty_alert_data')->nullable()->comment('json data of nbr created alert, nbr abort alert etc');
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
    }
};
