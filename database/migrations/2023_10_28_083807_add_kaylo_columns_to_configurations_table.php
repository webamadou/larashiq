<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'configurations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            if (! Schema::hasColumn($this->table, 'kayloo_api_calls_status') && ! Schema::hasColumn($this->table, 'latest_kayloo_api_calls')) {
                $table->integer('kayloo_api_calls_status')->default(0)->nullable()->after('home_bloc_one_video');
                $table->timestamp('latest_kayloo_api_calls')->nullable()->after('kayloo_api_calls_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            if (Schema::hasColumn($this->table, 'kayloo_api_calls_status') && Schema::hasColumn($this->table, 'latest_kayloo_api_calls')) {
                $table->dropColumn('kayloo_api_calls_status');
                $table->dropColumn('latest_kayloo_api_calls');
            }
        });
    }
};
