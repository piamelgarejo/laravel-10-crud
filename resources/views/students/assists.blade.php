@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Asistencias del alumno
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
                        <label for="assists" class="col-md-6 col-form-label text-md-end text-start"><strong>Asistencias de {{$student->name}} {{$student->lastname}}:</strong></label>
                        
                        <div class="col-md-6" style="line-height: 35px;">
                            @foreach ($assists as $assist)
                                <li>{{date_format ($assist->created_at, "d/m/Y")}}</li>
                                
                            @endforeach
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
</x-app-layout>
@endsection