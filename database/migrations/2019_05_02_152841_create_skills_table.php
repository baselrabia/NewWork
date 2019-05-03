<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id');
            $table->string('name')->unique();
            $table->timestamps();
        });
        Schema::create('job_skill', function (Blueprint $table) {
            $table->integer('job_id');
            $table->integer('skill_id');
            $table->timestamps();
            $table->primary(['job_id','skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skill');
        Schema::dropIfExists('skills');
    }
}
