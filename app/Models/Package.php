<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
