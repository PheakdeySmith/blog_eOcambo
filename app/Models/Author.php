<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function articles() {
        return $this->belongsToMany(Article::class, 'article_authors');
    }
}
