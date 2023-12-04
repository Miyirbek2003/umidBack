<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatments_id')->nullable();
            $table->foreign('treatments_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('treatments_translations');
    }
}
