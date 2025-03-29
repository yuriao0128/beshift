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
            // `TIME` から `VARCHAR` への変更
            $table->string('available_time')->change();
        });
    }
    
    public function down()
    {
        Schema::table('available_schedules', function (Blueprint $table) {
            // もし元に戻す場合は `TIME` に変更
            $table->time('available_time')->change();
        });
    }
};
