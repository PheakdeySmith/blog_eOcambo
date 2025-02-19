<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'published_date', 'reading_time',
        'difficulty', 'content', 'article_url'
    ];

    protected $casts = [
        'content' => 'array',
        'published_date' => 'date',
        'last_updated' => 'datetime',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'article_authors');
    }

    public function engagements() {
        return $this->hasOne(ArticleEngagement::class);
    }
}
