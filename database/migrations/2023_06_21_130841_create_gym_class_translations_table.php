<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('gym_class_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gym_class_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();

            $table->unique(['gym_class_id', 'locale']);
            $table->foreign('gym_class_id')->references('id')->on('gym_classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gym_class_translations');
    }
};
