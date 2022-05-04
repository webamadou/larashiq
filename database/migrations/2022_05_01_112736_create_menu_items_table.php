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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable(true);
            $table->foreignId('menu_id')->nullable(true);
            $table->foreignId('page_id')->nullable(true);
            $table->string('icons')->nullable(true)->default("");
            $table->text('url')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('roles')->nullable(true)->default("")->description('A list or roles name seperated by comas');
            $table->boolean('public')->nullable(true);
            $table->integer('position')->nullable(true);
            $table->integer('visible')->nullable(true);
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
        Schema::dropIfExists('menu_items');
    }
};
