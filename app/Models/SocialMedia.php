<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialMedia extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'link',
        'order',
        'houseId',
        'socialMediaTypeId'
    ];

    public function getSocialMediaType()
    {
        return $this->hasOne(SocialMediaType::class, 'id', 'socialMediaTypeId');
    }
}
