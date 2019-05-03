<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->unsigned();
 
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->text('job_type')->nullable();
            $table->integer('experience')->unsigned()->nullable();
            $table->integer('salary')->unsigned()->nullable();
            $table->string('education')->nullable();            
            $table->string('career_level')->nullable();
            $table->string('location', 60)->nullable();
            $table->string('address')->nullable();           

           

            $table->boolean('availability')->default(1);
            $table->boolean('approved')->default(0);
            $table->string('approved_by')->nullable();
            $table->datetime('approved_at')->nullable();




            $table->string('company_name');
            $table->bigInteger('company_id')->unsigned();

            

            
        
            

            $table->timestamps();
        });
        Schema::table('jobs', function (Blueprint $table) {
            
             $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
       Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['admin_id']);


            });

        Schema::dropIfExists('jobs');
    }
}
