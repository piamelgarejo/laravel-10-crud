@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Consultar alumno
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
                    <form action="{{ route('assists.show') }}" method="get">
                        @csrf
    
                        <div class="mb-3 row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                            <div class="col-md-6">
                              <input type="integer" class="form-control @error('student_dni') is-invalid @enderror" id="student_dni" name="student_dni" value="{{ old('student_dni') }}">
                                @if ($errors->has('student_dni'))
                                    <span class="text-danger">{{ $errors->first('student_dni') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Buscar">
                        </div>
                        
                    </form>
                     
                    
                </div>
            </div>
        </div>    
    
</x-app-layout>

@endsection