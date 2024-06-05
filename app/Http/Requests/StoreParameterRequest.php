<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParameterRequest extends FormRequest
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
            'qty_classes' => 'required|integer',
            'percent_prom' => 'required|integer',
            'percent_regular' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'qty_classes.required' => 'Debe ingresar la cantidad de clases del año lectivo',
            'percent_prom.required' => 'Debe ingresar porcentaje necesario de asistencias para promocionar',
            'percent_regular.required' => 'Debe ingresar porcentaje necesario de asistencias para regularizar',
            'qty_classes.integer' => 'Debe ingresar sólo numero enteros',
            'percent_prom.integer' => 'Debe ingresar sólo numero enteros',
            'percent_regular.integer' => 'Debe ingresar sólo numero enteros',
        ];
    }
}
