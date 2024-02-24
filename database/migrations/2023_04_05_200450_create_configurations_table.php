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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->mediumText('bilboard_title')->nullable();
            $table->mediumText('bilboard_subtitle')->nullable();
            $table->mediumText('home_video_title')->nullable();
            $table->mediumText('home_video_subtitle')->nullable();
            $table->mediumText('home_video_embed_code')->nullable();
            $table->mediumText('facebook_link')->nullable();
            $table->mediumText('twiter_link')->nullable();
            $table->mediumText('instagram_link')->nullable();
            $table->mediumText('linkedin_link')->nullable();
            $table->mediumText('official_address')->nullable();
            $table->mediumText('official_phone_nums')->nullable();
            $table->mediumText('official_email_address')->nullable();
            $table->mediumText('customer_space_url')->nullable();
            $table->mediumText('home_bloc_one_title')->nullable();
            $table->text('home_bloc_one_video')->nullable();
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
        Schema::dropIfExists('configurations');
    }
};
