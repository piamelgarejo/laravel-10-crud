@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Alumno
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Inicio</a>
            </div>
        </div>
    </x-slot>


<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
           
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                        <div class="col-md-6">
                          <input type="integer" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ $student->dni }}">
                            @if ($errors->has('dni'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $student->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ $student->lastname }}">
                            @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-end text-start">Fecha de nacimiento</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('quantity') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ $student->birthdate }}">
                            @if ($errors->has('birthdate'))
                                <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cluster" class="col-md-4 col-form-label text-md-end text-start">Grupo</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('cluster') is-invalid @enderror" id="cluster" name="cluster">{{ $student->cluster }}</textarea>
                            @if ($errors->has('cluster'))
                                <span class="text-danger">{{ $errors->first('cluster') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
</x-app-layout>

@endsection