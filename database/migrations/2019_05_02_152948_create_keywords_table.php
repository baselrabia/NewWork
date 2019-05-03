<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->integer('admin_id');
            $table->string('name')->unique();
            $table->timestamps();
        });
        Schema::create('job_keyword', function (Blueprint $table) {
            $table->integer('job_id');
            $table->integer('keyword_id');
            $table->timestamps();
            $table->primary(['job_id','keyword_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_keyword');
        Schema::dropIfExists('keywords');
    }
}
