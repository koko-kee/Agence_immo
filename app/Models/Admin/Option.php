<?php

namespace App\Models\Admin;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function property()
    {
        return $this->belongsToMany(Property::class);
    }


}
