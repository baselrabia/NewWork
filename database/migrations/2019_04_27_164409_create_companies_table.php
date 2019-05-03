<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->unsigned();

            $table->string('name')->unique();
            $table->text('brief')->nullable();
            $table->string('logo')->default("company-logo.png");
            $table->string('location', 60)->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->datetime('founded_at')->nullable();
            $table->integer('employees')->unsigned()->nullable();



            $table->timestamps();
        });

         Schema::table('companies', function (Blueprint $table) {
            
             $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');



              });

         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
             $table->dropForeign(['admin_id']);
        });

        Schema::dropIfExists('companies');
    }
}
