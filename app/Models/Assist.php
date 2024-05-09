<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assist extends Model
{
    use HasFactory; 

    public function student(){
        return $this-> belongsTo(Student::class, 'student_dni', 'dni');
    }
}
