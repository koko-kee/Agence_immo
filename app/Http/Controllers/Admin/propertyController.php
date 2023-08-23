<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPropertyRequest;
use App\Models\Admin\Option;
use App\Models\Admin\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class propertyController extends Controller
{
  
    public function index()
    {
        return View('property.index',[
            "properties" => property::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    public function create()
    {
        $property = new property();

        $property->fill([

            'surface' => 40,
            'rooms' => 1,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Monpelier',
            'postal' => '34000',
            'sold' => false,

        ]);

        return View('property.create',[
            "proprety" => $property,
            "options" => Option::all()
        ]);
    }

    public function store(FormPropertyRequest $request)
    {
        $validatedData = $request->validated();
        $images = $validatedData['images'] ?? null; 

        $property = Property::create($validatedData);
        $property->option()->sync($validatedData['options'] ?? []);

        if ($images){
            $Imagepaths = [];
            foreach ($images as $image) {
                $pathName = $image->store('blog', 'public');
                $Imagepaths[] = ['image' => $pathName];
            }
            $property->image()->createMany($Imagepaths);
        }
        return redirect()->route('property.index')->with('success', 'Le bien a bien été enregistre');
    }


    public function edit(property $property)
    {
        return View('property.edit',[
            "options" => Option::all(),
            "proprety" => $property
        ]);
    }

    public function update(property $property , FormPropertyRequest $request )
    {
        $validatedData = $request->validated();
        $images = $validatedData['images'] ?? null;
    
        if ($images) {
            $Imagepaths = [];
    
            foreach ($images as $image) {
                $pathName = $image->store('blog', 'public');
                $Imagepaths[] = ['image' => $pathName];
            }
    
            if ($property->image->isNotEmpty()) {

                foreach ($property->image as $image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }
                $property->image()->createMany($Imagepaths);
            }
        }
    
        $property->update($validatedData);
        return redirect()->route('property.index')->with('success', 'Le bien a bien été modifier');
    }
    

    public function remove(property $property)
    {
        if($property->image)
        {
            foreach($property->image as $image)
            {
                Storage::disk('public')->delete($image->image);
            }
        }

        $property->option()->detach();
        $property->delete();
        return redirect()->route('property.index')->with('success', 'Le bien a bien été supprimer');
    }


    public function extractData(property $property , FormPropertyRequest $request)
    {
        $validatedData = $request->validated();
        $images = $validatedData['images'] ?? null;
    }

}
