@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Loggings del sistema
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Inicio</a>
            </div>
        </div>
    </x-slot>
    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Accion</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Browser</th>
                    <th scope="col">Creado a</th>
                    <th scope="col">Actualizado a</th> 
                  </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($logging as $log)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->user }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->browser }}</td>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->updated_at }}°</td>
                    </tr>
                    @empty
                        <td colspan="7">
                            <span class="text-danger">
                                <strong>No loggings Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
              </table>


</x-app-layout>

@endsection