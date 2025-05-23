<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageCatFilter extends FormRequest
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
            "name" => ["required", "string"],
            "color" => ["required", "regex:/^#[0-9a-fA-F]{6}$/"],
            "departement" => ["required", "integer"],
            "birthday" => ["required", "date", "before:today"],
            "is_lost" => ["required", "boolean"],
        ];
    }
}
