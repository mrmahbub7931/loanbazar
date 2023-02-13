<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    // protected $fillable = ['name','slug','meta_title','meta_desc','status'];
    protected $guarded = ['id'];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
