<?php

namespace App\Models;

use App\Models\CardServiceDoc;
use App\Models\CardServiceFaq;
use App\Models\CardServiceRow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardService extends Model
{
    use HasFactory;
    protected $table = 'card_services';
    protected $fillable = ['user_id', 'service_title', 'title_description', 'disclaimer'];

    public function getServiceRows()
    {
        return $this->hasMany(CardServiceRow::class,'card_service_id');
    }

    public function getServiceFaqs()
    {
        return $this->hasMany(CardServiceFaq::class,'card_service_id');
    }

    public function getServiceDocs()
    {
        return $this->hasMany(CardServiceDoc::class,'card_service_id');
    }

}
