<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Assist;
use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class AssistController extends Controller
{

    public function create()
    {
        return view('assists.create');
    }

     public function store($dni) 
     {
        $exist = Assist::where('student_dni',$dni)->latest()->first();

        if ($exist) {
            $lastAssist = $exist->created_at->format('Y-m-d');
            $today = now()->format('Y-m-d');

        if ($lastAssist == $today) {
            return redirect()->route('assists.search')->withErrors('El alumno ya posee asistencias cargada hoy');
        }
    }
            $assist = new Assist();
            $assist->student_dni = $dni;
            $assist->save();
            
            return redirect()->route('assists.search')->withSuccess('Asistencia del día cargada con éxito');
           
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

    public function condition(Request $request){
            
            $conditions = $this->filterByYear($request);
            return view('assists.condition',[
                'students' => $conditions,
            ]);
    }

    
    public function filterByYear(Request $request){

            $year = $request->input('year');

            if ($year == 'all') {
                $students = Student::all();
            } else {
                $students = Student::where('year', $year)->select('dni','name','lastname')->get();
            }
            
            $parameters = Parameter::select('qty_classes','percent_prom','percent_regular')->first();
            
            $qty_classes = $parameters->qty_classes;
            $percent_prom = $parameters->percent_prom;
            $percent_regular =$parameters->percent_regular;
            $conditions = [];

            foreach ($students as $student) {
                $dni = $student->dni;
                $countAssists = Assist::where('student_dni', $dni)->count();
                $percent = ($countAssists / $qty_classes) * 100;

                if ($percent < $percent_regular) {
                    $condition = 'Libre';
                } elseif ($percent >= $percent_regular && $percent < $percent_prom) {
                    $condition = 'Regular';
                } else {
                    $condition = 'Promoción';
                }

                $conditions[] = [
                    'dni' => $dni,
                    'name' => $student->name,
                    'lastname' => $student->lastname,
                    'countAssists' => $countAssists,
                    'condition' => $condition,
                ];
    }

                usort($conditions, function ($a, $b) {
                    return strcmp($a['lastname'], $b['lastname']);
                });
                
                return ($conditions);
    
                
    }

        public function export(Request $request) 
        { 
        $data = json_decode($request->query('data'), true);

        return Excel::download(new StudentsExport($data), 'Condiciones-estudiantes.xlsx');
            
        }
    }

    // $conditions = $this->filterByYear(request()); // Obtener las condiciones filtradas
    
    //         dd($conditions); // Verificar los datos que estamos obteniendo
            
    //         return Excel::download(new StudentsExport($conditions), 'Condiciones-estudiantes.xlsx');