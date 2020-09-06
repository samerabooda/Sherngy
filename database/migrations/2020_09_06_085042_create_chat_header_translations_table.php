<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatHeaderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_header_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('chat_header_id')->unsigned();
            $table->foreign('chat_header_id')->references('id')->on('chat_headers')->onDelete('cascade');

            $table->text('translation');
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
        Schema::dropIfExists('chat_header_translations');
    }
}
