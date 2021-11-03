<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('topic_id');
            $table->longText('published_data');
            $table->char('processed',1)->default('N');
            $table->timestamps();

            $table->foreign('topic_id')
                ->references('id')
                ->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publishes');
    }
}
