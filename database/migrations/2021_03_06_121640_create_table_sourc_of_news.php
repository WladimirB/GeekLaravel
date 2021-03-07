<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSourcOfNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_of_news', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->boolean('is_actual')
                  ->nullable()
                  ->default(1);
            $table->dateTime('updated_at')
                  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_of_news');
    }
}
