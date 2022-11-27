<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name','slug','meta_title','meta_desc','status'];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'category_posts')->withTimestamps();
    }
}
