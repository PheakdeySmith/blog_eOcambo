<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('image', 500)->nullable()->comment('URL of the article image');
            $table->string('title', 255);
            $table->date('published_date');
            $table->timestamp('last_updated')->useCurrent()->useCurrentOnUpdate();
            $table->integer('reading_time')->default(5)->comment('Time in minutes');
            $table->integer('difficulty')->check('difficulty BETWEEN 1 AND 5');
            $table->json('content')->comment('Article content in structured format');
            $table->string('article_url', 500)->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('articles');
    }
};
