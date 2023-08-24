<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\property;
use App\Mail\PropertContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FormContactRequest;
use App\Http\Requests\SearchPropertyRequest;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = property::query()->with('image');
        
        if(!empty($request->input('price')))
        {
            $query = $query->where('price' , '<=' , $request->input('price'));
        }

        if(!empty($request->input('surface')))
        {
            $query = $query->where('surface' , '<=' , $request->input('surface'));
        }

        if(!empty($request->input('rooms')))
        {
            $query = $query->where('rooms' , '<=' , $request->input('rooms'));
        }

        if(!empty($request->input('title')))
        {
            $query = $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
        return view('all', [
            'properties' => $query->paginate(25),
        ]);
    }

    public function show(string $name , property $property  )
    {
        return View('property.show',[
            "property" =>  $property
        ]);
    }

    public function contact(property $property , FormContactRequest $request )
    {
        Mail::send(new PropertContactMail($property ,$request->validated()));
        return back()->with('success','Votre demande de contact a ete envoye');
    }  
}