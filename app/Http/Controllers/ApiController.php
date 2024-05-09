<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;

class ApiController extends Controller
{
    public function conditionStudent($id)
    {   
        $student = Student::find($id);
        $cant = count($student->assists);
        
        $percent = ($cant/10)*100;
        
        if ($percent<60){
            $condition='Libre';
        }

        if ($percent>=60 and $percent<80){
            $condition='Regular';
        }

        if ($percent>=80){
            $condition='Promoción';
        }

        return ($condition);
    }
}
