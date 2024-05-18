<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => 'required|integer|unique:students,dni,'.$this->student->id,
            'name' => 'required|string|max:250',
            'lastname' => 'required|string|max:250',
            'birthdate' => 'required|date|before_or_equal:' .now()->subYears(18)->format('d-m-Y'),
            'cluster' => 'required|string',
        ];
    }

    public function messages()
    {
        return[
            'dni.required' => 'Debe ingresar su Dni',
            'dni.unique' => 'El Dni ingresado ya está registrado',
            'name.required' => 'Debe ingresar su nombre',
            'lastname.required' => 'Debe ingresar su apellido',
            'birthdate.required' => 'Debe ingresar su fecha de nacimiento',
            'birthdate.before_or_equal' => 'Debe ser mayor a 18 años para registrarse',
            'cluster.required' => 'Debe ingresar el grupo al cual pertenece',
        ];
        
    }
}