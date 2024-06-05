@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" style= "height: 30px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis alumnos
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar nuevo alumno</a>
            </div>
        </div>
    </x-slot>


<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                
                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Opciones</th> 
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->birthdate }}</td>
                            <td>{{ $student->cluster }}</td>
                            <td>{{ $student->year }}°</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('student.assists', $student->dni) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Asistencias</a>

                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Mostrar</a>

                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="7">
                                <span class="text-danger">
                                    <strong>No Student Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $students->links() }}

            </div>
        </div>
    </div>    
</div>
<div class="row justify-content-center mt-3">
    <div class="col-md-8 alert alert-success text-center" role="alert">
        @if(count($birthdays) > 0)
            <h2>Hoy es el cumpleaños de:</h2>
            <ul>
                @foreach($birthdays as $birthday)
                    <li>{{ $birthday }}</li>
                @endforeach
            </ul>
            <h2>¡Deséale un feliz día!</h2>
        @else
            <p>No hay cumpleaños hoy.</p>
        @endif
    </div>
</div>
</x-app-layout>   
@endsection
