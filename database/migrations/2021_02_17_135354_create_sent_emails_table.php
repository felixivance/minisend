<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        'userId','toEmail','subject','content','status'
        Schema::create('sent_emails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->index();
            $table->foreign('userId')->references('id')->on('users');
            $table->string('toEmail');
            $table->string('subject');
            $table->longText('content');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('sent_emails');
    }
}
