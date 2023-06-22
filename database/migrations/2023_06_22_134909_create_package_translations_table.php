<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('package_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->unique(['package_id', 'locale']);
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('package_translations');
    }
};
