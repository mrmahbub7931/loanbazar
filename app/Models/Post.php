<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];


    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
}
