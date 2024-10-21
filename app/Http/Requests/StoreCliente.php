<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCliente extends FormRequest
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
            'am' => 'nullable|string|max:255',
            'genero' => 'nullable|in:Femenino,Masculino,Otro',
            'direccion' => 'nullable|string|max:255',
            'fenac' => 'nullable|date',
            'telefono' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'contrasena' => 'required|string|max:255'
        ];
    }
}
