<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('desired_conditions', function (Blueprint $table) {
            $table->string('desired_work_time')->nullable()->after('desired_location');
            $table->text('desired_work_detail')->nullable()->after('desired_work_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desired_conditions', function (Blueprint $table) {
            $table->dropColumn(['desired_work_time', 'desired_work_detail']);
        });
    }
};
