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
        Schema::table('career_records', function (Blueprint $table) {
            // 不要になったカラムを削除（雇用形態, start_date, end_date）
            $table->dropColumn(['employment_type', 'start_date', 'end_date']);
    
            // 新たに "years" (string) と "skills" (text) を追加
            $table->string('years')->nullable()->after('job_type');
            $table->text('skills')->nullable()->after('years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('career_records', function (Blueprint $table) {
            // up()の逆操作
            $table->string('employment_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
    
            $table->dropColumn(['years', 'skills']);
        });
    }
};
