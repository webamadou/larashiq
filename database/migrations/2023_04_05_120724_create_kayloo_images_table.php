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
        Schema::create('kayloo_images', function (Blueprint $table) {
            $table->id();
            $table->mediumText('url');
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');
            $table->string('model_ref')
                ->nullable(true)
                ->comment('This is used for prop (maybe on others) to avoid overwriting');
            $table->integer('is_default')->default(0)->nullable();
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
        Schema::dropIfExists('kayloo_images');
    }
};
