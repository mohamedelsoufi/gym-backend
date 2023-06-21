<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('day_gym_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('day_id')->nullable();
            $table->unsignedBigInteger('gym_class_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_gym_classes');
    }
};
