<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'dni',
        'name',
        'lastname',
        'birthdate',
        'cluster',
        'year'
    ];

    public function assists() {
        return $this->hasMany(Assist::class, 'student_dni', 'dni');
    }
}

