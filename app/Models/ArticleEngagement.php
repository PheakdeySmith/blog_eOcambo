<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleEngagement extends Model {
    use HasFactory;

    protected $fillable = ['article_id', 'comments', 'shares'];

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
