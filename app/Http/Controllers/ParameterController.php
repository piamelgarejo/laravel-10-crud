<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParameterRequest;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\RedirectResponse;

class ParameterController extends Controller
{
    public function createParameters(){
        return view('parameters.create');
    }

    public function storeParameters(StoreParameterRequest $request)
    {   
        $parametros = Parameter::first();

        if (!$parametros){
        Parameter::create($request->all());
        }

        else{
            $parametros->fill($request->validated());
            $parametros->save();
        }

        return redirect()->route('students.index')
        ->withSuccess('Parametros creados con éxito');
    }
    
}