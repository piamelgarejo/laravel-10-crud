@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Datos del alumno
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Inicio</a>
            </div>
        </div>
    </x-slot>
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Dni:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->dni }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->lastname }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de nacimiento:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->birthdate }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="cluster" class="col-md-4 col-form-label text-md-end text-start"><strong>Grupo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->cluster }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
</x-app-layout>   
@endsection