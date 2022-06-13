<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crtsorags', function (Blueprint $table) {
            $table->id();
            $table->string('ady');
            $table->string('sorag');
            $table->string('barlag1');
            $table->string('barlag2');
            $table->string('jogap');
            $table->float('bal');
            $table->string('category');
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
        Schema::dropIfExists('crtsorags');
    }
};
