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
        Schema::create('estimations', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->mediumText('address');
            $table->foreignId('property_type_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->year('built_year')->nullable();
            $table->integer('nbr_rooms')->nullable();
            $table->integer('nbr_bed_rooms')->nullable();
            $table->integer('living_space')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('living_room_surface')->nullable();
            $table->integer('nbr_water_room')->nullable();
            $table->integer('nbr_bathroom')->nullable();
            $table->text('commodities')->nullable();
            $table->integer('heating_system')->nullable();
            $table->integer('general_condition')->nullable();
            $table->integer('furnished')
                ->default(0)
                ->nullable()
                ->comment('0=non furnished;1=furnished');
            $table->integer('kitchen_type')->nullable();
            $table->integer('garage_space')->nullable();
            $table->integer('nbr_parking')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('status')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('estimations');
    }
};
