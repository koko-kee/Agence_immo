<?php

namespace App\Models\Admin;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal',
        'sold',
    ];


    public function option()
    {
        return $this->belongsToMany(Option::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

}
