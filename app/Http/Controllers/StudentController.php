<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Assist;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() : View
    {
        return view('students.index', [
            'students' => Student::latest()->paginate(6)
        ]);
    }

    public function create(Student $student) : View
    {
        return view('students.create', [
            'student' => $student
        ]);
    }

    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('students.index')
                ->withSuccess('Nuevo lumno agregado con éxito');
    }

    public function show(Student $student) : View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    public function edit(Student $student) : View
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
                ->withSuccess('Alumno editado con éxito.');
    }

    public function destroy(Student $student) : RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
                ->withSuccess('Alumno eliminado con éxito');
    }

    public function assists($dni) : View
    {   
        $student = Student::where('dni', $dni)->firstOrFail();
        $assists = $student->assists;
    
        return view('students.assists', compact('student','assists'));
    }
    
}
