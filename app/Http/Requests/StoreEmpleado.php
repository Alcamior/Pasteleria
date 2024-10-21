<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleado extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'ap' => 'required|string|max:255',
            'am' => 'required|string|max:255',
            'genero' => 'nullable|in:Femenino,Masculino,Otro',
            'fenac' => 'nullable|date',
            'feIng' => 'required|date',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'contrasena' => 'required|string|max:255'
        ];
    }
}
