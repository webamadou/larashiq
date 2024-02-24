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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->string('api_code')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('owner')->nullable(true);
            $table->string('api_owner')->nullable(true);
            $table->foreignId('property_type_id')
                ->nullable(false)
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedBigInteger('location_type_id') // (residential, populaire->nullable())
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('country_id')
                ->default(188)
                ->nullable(true);
            $table->mediumText('city_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->mediumText('localisation_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->integer('availability_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->comment("0: available; 1: pending; 2: sold/rented; 4: disabled");
            $table->integer('property_usage_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->comment("0: available; 1: pending; 2: sold/rented; 4: disabled");
            $table->integer('total_surfaces')->default(0)->nullable();
            $table->integer('furnished')
                ->default(0)
                ->nullable()
                ->comment('0=nodefined;1=non furnished;2=furnished');
            $table->unsignedBigInteger('base_price')->nullable();
            $table->float('montant_syndic')->nullable();
            $table->float('deposit_percentage')->nullable();
            $table->float('vta_rate')->nullable();
            $table->float('tom_tax_rate')->nullable();
            $table->float('tlv_tax_rate')->nullable();
            $table->float('commission_rate')->nullable();
            $table->float('commission_percentage')->nullable();
            $table->float('bail_percentage')->nullable();
            $table->float('property_tax')->nullable();
            $table->float('additional_charges')->nullable();
            $table->decimal('generate_total_cost', 15, 2)->nullable();
            $table->integer('acquisition_type')->default(0);
            $table->string('zone')->nullable();
            $table->string('stage')->nullable();
            $table->string('position')->nullable();
            $table->mediumText('street')->nullable();
            $table->string('apartment_number')->nullable();
            $table->integer('nbr_rooms')->nullable();
            $table->integer('nbr_bedrooms')->nullable();
            $table->integer('nbr_bathrooms')->nullable();
            $table->integer('nbr_showerrooms')->nullable();
            $table->integer('nbr_lounge_rooms')->nullable();
            $table->integer('nbr_kitchens')->nullable();
            $table->integer('holidays_good')->default(0)->nullable();
            $table->text('json_commodities')->nullable()
                ->comment('This is more like a cheating column for the many-to-many relationship');
            $table->float('property_width')->nullable();
            $table->float('stay_area')->nullable();
            $table->integer('nbr_mitoyennete')->nullable();
            $table->integer('electric_gate')->nullable();
            $table->integer('has_basement')->nullable();
            $table->integer('garden')->nullable();
            $table->integer('nbr_cellars')->nullable();
            $table->float('land_area')->nullable();
            $table->integer('nbr_balconies')->nullable();
            $table->integer('nbr_terraces')->nullable();
            $table->integer('heating_system')->nullable();
            $table->integer('property_state')
                ->nullable()
                ->comment('for new properties value is 1; we dont the othe possible value yet');
            $table->integer('nbr_views')->nullable();
            $table->integer('highlighted')->nullable()->default(0);
            $table->timestamp('last_availability_update')->nullable();
            $table->mediumText('embedded_url')->nullable();
            $table->integer('savedFromSite')->nullable()->default(1)->comment('1=from site; 2=fromAPI...');
            $table->json('coordinates')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('properties');
        Schema::enableForeignKeyConstraints();
    }
};
