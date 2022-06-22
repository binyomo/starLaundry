<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopbarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topbars', function (Blueprint $table) {
            $table->id();
            $table->string('text_1');
            $table->string('icon_1');
            $table->string('text_2');
            $table->string('icon_2');
            $table->string('text_3');
            $table->string('icon_3');
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
        Schema::dropIfExists('topbars');
    }
}
