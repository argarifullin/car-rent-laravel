<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    use HasFactory;

    public function pickpoint()
    {
        return $this->belongsTo(Pickpoint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ocupied()
    {
        return $this->ocupied;
    }

    public $timestamps = false;

    protected $fillable = [
        'model',
        'pickpoint_id',
        'booked',
        'booked_until',
        'user_id',
        'ocupied',
        'name',
        'year',
        'image'
    ];

    public static function uploadImage(Request $request)
    {
        if ($request->hasFile('image')){
            $folder=date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }
    }


}
