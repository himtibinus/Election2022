<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailQueueV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adds new features into the existing email queue database
        if (!Schema::hasTable('email_queue')) Schema::create('email_queue', function (Blueprint $table) {
            $table->increments('id');
            $table->text('email');
            $table->text('subject');
            $table->longText('message');
            $table->text('status')->default('PENDING');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->text('message_type')->default('PLAINTEXT');
            $table->text('sender_name')->default('Registration System');
            $table->integer('priority')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_queue');
    }
}
