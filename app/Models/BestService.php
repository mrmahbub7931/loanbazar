<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BestService extends Model
{
    use HasFactory;

    protected $table = 'best_services';

    protected $fillable = [
        'user_id',
        'title',
        'url',
        'icon_image',
        'short_desc',
        'btn_txt',
        'status'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
