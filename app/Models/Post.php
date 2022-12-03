<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];


    /**
     * The categories() function returns a relationship between the Post model and the Category model
     * 
     * @return A collection of categories that are associated with the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
    }

    /**
     * A post can have many tags, and a tag can have many posts.
     * 
     * @return A collection of tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * > This function returns the writer that wrote the post
     * 
     * @return A collection of comments
     */
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
