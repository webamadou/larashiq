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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->nullable();
            $table->foreignId("parent_id")->nullable(true);
            $table->integer("visible")->nullable()->default(0);
            $table->integer("menu_position")->nullable()->default(1);
            $table->text("roles")->nullable(true)->description('A list of role names seperated by comas');
            $table->boolean("public")->default(true);
            $table->integer("position")->nullable(true);
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
        Schema::dropIfExists('menus');
    }
};
