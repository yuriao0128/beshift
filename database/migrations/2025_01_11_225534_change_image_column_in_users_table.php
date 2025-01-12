<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // imageカラムを NOT NULL + デフォルト値に変更
            $table->string('image')->default('images/index/sample.png')->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // down() で戻す場合。元々が nullable だったなら以下のように
            // $table->string('image')->nullable()->change();

            // 元々から NOT NULL かつデフォルト値なしだった場合に戻すなら:
            $table->string('image')->change();
        });
    }
};
