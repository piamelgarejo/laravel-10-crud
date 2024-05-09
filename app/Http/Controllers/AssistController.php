<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistRequest;
use Illuminate\Http\RedirectResponse;

class AssistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssistRequest $request) : RedirectResponse
    {
        
        $dniAssist = $request->input('student_dni'); 
        $assist = new Assist();
        $assist->student_dni = $dniAssist;
        $assist->save();
        return redirect()->route('students.index')->withSuccess('Asistencia cargada con éxito');
        
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
