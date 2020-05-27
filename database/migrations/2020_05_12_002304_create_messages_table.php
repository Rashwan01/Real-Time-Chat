<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_from")->comment("who send message");
            $table->foreignId("user_To")->comment("who received message");
            $table->longText("body");
            $table->timestamp("read_at")->nullable();
            $table->timestamps();
          $table->foreign("user_from")
                     ->references("id")
                     ->on("users")
                     ->onDelete("cascade")
                     ->onUpdate("cascade");
            $table->foreign("user_to")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
