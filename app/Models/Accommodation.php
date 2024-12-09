<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = ['room_type_id', 'accommodation'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
