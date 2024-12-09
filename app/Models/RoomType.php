<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'type'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
