<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\property;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            'properties' => property::with('image')->orderBy('created_at', 'desc')->limit(4)->get(),
        ]);
    }
}
