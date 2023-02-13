<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporatePartners extends Model
{
    use HasFactory;

    protected $table = 'corporate_partners';
    protected $guarded = ['id'];
}
