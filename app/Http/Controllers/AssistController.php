<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Exception;

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
        $exist = Assist::where('student_dni',$dni)->latest()->first();

        $lastAssist = $exist->created_at->format('Y-m-d');
        $today = now()->format('Y-m-d');

        if ($lastAssist <> $today){
            $assist = new Assist();
            $assist->student_dni = $dni;
            $assist->save();
            return redirect()->route('assists.search')->withSuccess('Asistencia del día cargada con éxito');
           
        }
        return redirect()->route('assists.search')->withErrors('El alumno ya posee asistencias cargada hoy');
            
     }

    public function search()
    {
        return view('assists.search');
    }

    public function show(Request $request)
    {
        $student = Student::where('dni', $request->student_dni)->first();

        if (!$student){
            return redirect()->route('assists.search')->withErrors('Alumno no existe');
        }
                return view('assists.show', compact('student'));
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
