<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickpoint extends Model
{
    use HasFactory;

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function managers()
    {
        return $this->hasOne(User::class);
    }

    public $timestamps = false;

    protected $fillable = [
        'address',
    ];
}
