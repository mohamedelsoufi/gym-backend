<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('day_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('day_id');
            $table->string('locale')->index();
            $table->string('day')->nullable();

            $table->unique(['day_id', 'locale']);
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_translations');
    }
};
