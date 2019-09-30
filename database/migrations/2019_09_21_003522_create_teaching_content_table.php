<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subject_id');
            $table->string('lecture_name')->charset('utf8');
            $table->smallInteger('lesson_number');
            $table->string('file_content');
            $table->date('date');
            $table->longText('note')->charset('utf8');
            $table->smallInteger('status')->nullable();
            $table->bigInteger('substitute_teacher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teaching_content');
    }
}
