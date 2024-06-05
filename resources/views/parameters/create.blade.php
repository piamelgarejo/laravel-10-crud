@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Parametros para el sistema
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Inicio</a>
            </div>
        </div>
    </x-slot>

@if ($message = Session::get('success'))
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>
</div>
@endif

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
           
            <div class="card-body">
                <form action="{{ route('parameters.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Cantidad de días de clases:</label>
                        <div class="col-md-6">
                          <input type="integer" class="form-control @error('qty_classes') is-invalid @enderror" id="qty_classes" name="qty_classes" value="{{ old('qty_classes') }}">
                            @if ($errors->has('qty_classes'))
                                <span class="text-danger">{{ $errors->first('qty_classes') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Porcentaje para promocionar:</label>
                        <div class="col-md-6">
                          <input type="integer" class="form-control @error('percent_prom') is-invalid @enderror" id="percent_prom" name="percent_prom" value="{{ old('percent_prom') }}">
                            @if ($errors->has('percent_prom'))
                                <span class="text-danger">{{ $errors->first('percent_prom') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-end text-start">Porcentaje para regularizar:</label>
                        <div class="col-md-6">
                          <input type="integer" class="form-control @error('percent_regular') is-invalid @enderror" id="percent_regular" name="percent_regular" value="{{ old('percent_regular') }}">
                            @if ($errors->has('percent_regular'))
                                <span class="text-danger">{{ $errors->first('percent_regular') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar parametros">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
</x-app-layout>

@endsection