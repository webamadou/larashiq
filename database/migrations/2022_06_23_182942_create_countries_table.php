<?php

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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->char('iso', 4)->nullable(true);
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('nicename', 80)->nullable(true);
            $table->char('iso3', 3)->nullable(true);
            $table->string('numcode')->nullable(true);
            $table->string('phonecode')->nullable(true);
            $table->integer('available')->nullable(true)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
