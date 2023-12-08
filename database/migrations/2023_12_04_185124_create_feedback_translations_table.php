<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feedback_id')->nullable();
            // $table->integer('slide_id')->unsigned()->index();
            $table->foreign('feedback_id')->references('id')->on('feedback')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('feedback_translations');
    }
}
