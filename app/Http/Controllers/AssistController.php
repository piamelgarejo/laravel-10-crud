<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\StudentController;
use App\Models\Student;

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
     public function store($dni) 
     {
         $assist = new Assist();
         $assist->student_dni = $dni;
         $assist->save();
         return redirect()->route('students.index')->withSuccess('Asistencia cargada con éxito');
        
     }

    public function search()
    {
        return view('assists.search');
    }

    public function show(Request $request)
    {

       $student = Student::where('dni', $request->student_dni)->firstOrFail();
        
       if ($student){
            return view('assists.show', compact('student'));
       }
       else {
            return redirect()->route('students.index')->withErrors('Alumno no existente');
       }
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
