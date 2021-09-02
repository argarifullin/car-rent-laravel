<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['car_id','client_id','manager_id','cost', 'credentials'];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id','id');
    }
}
