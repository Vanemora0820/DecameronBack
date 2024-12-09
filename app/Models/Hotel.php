<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'tax_id', 'max_rooms'];

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

}
