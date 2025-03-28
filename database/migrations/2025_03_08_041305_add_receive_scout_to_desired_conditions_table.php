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
        Schema::table('desired_conditions', function (Blueprint $table) {
            $table->boolean('receive_scout')->default(true)->after('desired_location');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desired_conditions', function (Blueprint $table) {
            //
        });
    }
};
