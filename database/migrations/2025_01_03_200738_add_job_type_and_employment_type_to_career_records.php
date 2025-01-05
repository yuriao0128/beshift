<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobTypeAndEmploymentTypeToCareerRecords extends Migration
{
    public function up()
    {
        Schema::table('career_records', function (Blueprint $table) {
            $table->string('job_type')->nullable()->after('position'); // 職種
            $table->string('employment_type')->nullable()->after('job_type'); // 雇用形態
        });
    }

    public function down()
    {
        Schema::table('career_records', function (Blueprint $table) {
            $table->dropColumn('job_type');
            $table->dropColumn('employment_type');
        });
    }
}
