<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'userId',
        'houseName',
        'contact',
        'address',
        'address2',
        'city',
        'zip',
        'longitude',
        'latitude'
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'userId');
    }

    public function nearbyAttraction()
    {
        return $this->hasMany(NearbyAttraction::class, 'houseId', 'id');
    }

    public function getHousePhoto()
    {
        return $this->hasMany(HouseImage::class, 'houseId', 'id');
    }

    public function getNearbyAttractionInOrder()
    {
        return $this->hasMany(NearbyAttraction::class, 'houseId', 'id')->orderBy('order', 'ASC');
    }

    public function getNearbyAttractions()
    {
        return $this->hasMany(NearbyAttraction::class, 'houseId', 'id');
    }

    public function getRooms()
    {
        return $this->hasMany(Room::class, 'roomId', 'id');
    }
}
