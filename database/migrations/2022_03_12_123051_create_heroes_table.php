<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('m_title');
            $table->text('m_desc');
            $table->string('icon_1');
            $table->string('title_1');
            $table->text('desc_1');
            $table->string('icon_2');
            $table->string('title_2');
            $table->text('desc_2');
            $table->string('icon_3');
            $table->string('title_3');
            $table->text('desc_3');
            $table->timestamps();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
