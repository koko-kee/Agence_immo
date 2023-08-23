<?php

namespace App\Models;

use App\Models\Admin\property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    
    public function property()
    {
        return $this->belongsTo(property::class);
    }
}
