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
        Schema::table('available_schedules', function (Blueprint $table) {
            $table->string('available_time')->change(); // TIME -> STRING
        });
    }

    public function down()
    {
        Schema::table('available_schedules', function (Blueprint $table) {
            // 以前の状態に戻す
            $table->time('available_time')->change(); 
        });
    }
};
