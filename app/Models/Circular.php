<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    use HasFactory;

    protected $table = 'circulars';

    // protected $fillable = ['user_id','job_title','job_location','job_description','status'];
    protected $guarded = ['id'];
}
