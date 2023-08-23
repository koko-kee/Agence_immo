<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormOptionRequest;
use App\Models\Admin\Option;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class optionController extends Controller
{

    public function index()
    {
        return View('options.index',[
            'options' => Option::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    public function create()
    {

        $option = new Option();
        $option->fill([
            'nom' => 'piscine'
        ]);
        return View('options.create',[
            'option' => $option
        ]);
    }

    public function store(FormOptionRequest $request)
    {
       $options = Option::create($request->validated());
       return redirect()->route('option.index')->with("success","l'option a bien ete creer");
    }


    public function edit(Option $option)
    {
        return View('options.edit',[
            'option' => $option
        ]);
    }

    public function update(Option $option , FormOptionRequest $request )
    {
        $option->update($request->validated());
        return redirect()->route('option.index')->with("success","l'option a bien ete modifier");
    }
    

    public function remove(Option $option )
    {
        $option->delete();
        return redirect()->route('option.index')->with("success","l'option a bien ete supprimer");
    }
}
