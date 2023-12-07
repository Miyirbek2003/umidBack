<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTreatmentsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_treatments_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_treatments_id')->nullable();
            $table->foreign('type_treatments_id')->references('id')->on('type_treatments')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('type_treatments_translations');
    }
}
