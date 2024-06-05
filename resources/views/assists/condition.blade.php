@extends('layouts.landing')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center height: 60px">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Condiciones de los alumnos
            </h2>
            <div class="ml-auto">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Inicio</a>
            </div>
        </div>
    </x-slot>

    @if ($errors->any())
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
        </div>
    </div>
@endif

@if ($message = Session::get('success'))
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>
</div>
@endif

@if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
@endif

<div class="row justify-content-center mt-3">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <label for="selectedYear">Seleccione un año:</label>
                <select id="selectedYear" name="selectedYear" onchange="filterByYear()">
                    <option value="all">Todos</option>
                    <option value="1">1° año</option>
                    <option value="2">2° año</option>
                    <option value="3">3° año</option>
                </select>
                
                <a href="#" onclick="downloadExcel()" class="btn btn-success my-3">Exportar a Excel</a>

                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cant. Asistencias</th>
                        <th scope="col">Condición</th> 
                      </tr>
                    </thead>
                    <tbody id="studentsTable" class="text-center">
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div>    
</div>
</x-app-layout>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        filterByYear();

        document.getElementById('selectedYear').value = 'all';
});
    function filterByYear() {
        let selectedYear = document.getElementById('selectedYear').value;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/filter-by-year', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ year: selectedYear })
        })
        
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data && data.length > 0) {
                let studentsTable = document.getElementById('studentsTable');
                studentsTable.innerHTML = '';

                data.forEach((student, index) => {
                    let row = `
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>${student.dni}</td>
                            <td>${student.lastname}</td>
                            <td>${student.name}</td>
                            <td>${student.countAssists}</td>
                            <td>${student.condition}</td>
                        </tr>
                    `;
                    studentsTable.innerHTML += row;
                });
                
        } else {
            console.log('No data received or empty data array.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        let studentsTable = document.getElementById('studentsTable');
        studentsTable.innerHTML = `
            <tr>
                <td colspan="6">
                    <span class="text-danger">
                        <strong>An error occurred while fetching data. Please try again.</strong>
                    </span>
                </td>
            </tr>
        `;
    });
    }
    
    function downloadExcel() {
    let selectedYear = document.getElementById('selectedYear').value;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/filter-by-year', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ year: selectedYear })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data && data.length > 0) {
            let exportUrl = `/conditions/export?data=${encodeURIComponent(JSON.stringify(data))}`;
            window.location.href = exportUrl;
        } else {
            console.log('No data received or empty data array.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>

@endsection