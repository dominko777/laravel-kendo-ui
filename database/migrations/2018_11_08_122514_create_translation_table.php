<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation', function (Blueprint $table) {
            $table->string('translation_id', 10)->nullable(false);
            $table->string('description');
            $table->string('label_id')->nullable(false);
            $table->text('text')->nullable(false);
            $table->integer('language_id')->nullable(false)->unsigned();
            $table->index('language_id');
            $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade');
            $table->primary(['translation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('translation', function (Blueprint $table) {
            $table->dropForeign('translation_language_id_foreign');
            $table->dropIndex('translation_language_id_index');
        });
        Schema::dropIfExists('translation');
    }
}
