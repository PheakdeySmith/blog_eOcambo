<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('article_engagements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->integer('comments')->default(0);
            $table->integer('shares')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('article_engagements');
    }
};
