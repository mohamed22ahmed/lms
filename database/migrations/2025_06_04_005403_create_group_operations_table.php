<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_operations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('meeting_times_id');
            $table->string('group_type')->default('study'); // study, semi_private, private
            $table->string('age_level')->default('6-8'); // 6-8, 9-12, 13-17
            $table->string('study_level')->default('standard'); // standard, advanced
            $table->string('language')->default('en'); // en, ar
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
        Schema::dropIfExists('group_operations');
    }
};
