<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->time('desired_start_time');  // 開始時間
            $table->time('desired_end_time');    // 終了時間
        });
    }
    
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['desired_start_time', 'desired_end_time']);
        });
    }
    
};
