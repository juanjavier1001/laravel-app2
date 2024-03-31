<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoles extends FormRequest
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
            "name" => ["required", "unique:roles,name"],
            "permissions" => "nullable|array",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "introduzca un nombre para el rol"
        ];
    }

    public function attributes(): array
    {

        return ["name" => "rol"];
    }
}
