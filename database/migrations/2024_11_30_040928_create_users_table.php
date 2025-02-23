<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        
           
            $table->unsignedBigInteger('security_question_1_id')->nullable();
            $table->string('security_answer_1', 255)->nullable(); 
            $table->unsignedBigInteger('security_question_2_id')->nullable();
            $table->string('security_answer_2', 255)->nullable(); 
            $table->unsignedBigInteger('security_question_3_id')->nullable();
            $table->string('security_answer_3', 255)->nullable(); 
        
            
            $table->foreign('security_question_1_id')->references('id')->on('security_questions')->onDelete('set null');
            $table->foreign('security_question_2_id')->references('id')->on('security_questions')->onDelete('set null');
            $table->foreign('security_question_3_id')->references('id')->on('security_questions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}