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
            // available_time カラムの型を string に変更
            $table->string('available_time')->change();
        });
    }

    public function down()
    {
        Schema::table('available_schedules', function (Blueprint $table) {
            // もとの TIME 型に戻す（適切な長さで）
            $table->time('available_time')->change();
        });
    }
};
