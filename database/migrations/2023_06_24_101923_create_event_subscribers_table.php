<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('no action')->onDelete('no action');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_subscribers');
    }
};
