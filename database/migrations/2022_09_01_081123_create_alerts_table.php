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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique()->nullable();
            $table->integer('acquisition');
            $table->string('budget_range');
            $table->string('rooms_range')->nullable();
            $table->text('surface_range')->nullable();
            $table->string('bed_room_range')->nullable();
            $table->text('commodities')->nullable();
            $table->string('floor_range')->nullable();
            $table->integer('frequency')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('active')->nullable()->default(1);
                $table->integer('nbr_sent')->default(0)->nullable();
            $table->timestamp('last_sent')->nullable();

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
        Schema::dropIfExists('alerts');
    }
};
