<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('career_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID
            $table->string('company_name'); // 会社名
            $table->string('position'); // 役職
            $table->date('start_date'); // 開始日
            $table->date('end_date')->nullable(); // 終了日（空欄可能）
            $table->text('description')->nullable(); // 職務内容（空欄可能）
            $table->timestamps(); // 作成・更新日時
        });
    }

    public function down()
    {
        Schema::dropIfExists('career_records');
    }
}
