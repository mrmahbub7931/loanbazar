<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "comments";

    /**
     * @var array
     */
    // protected $fillable = [
    //     'user_id',
    //     'post_id',
    //     'parent_id',
    //     'body'
    // ];
    protected $guarded = ['id'];
    /**
     * > The belongs to Relationship
     * 
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
}
