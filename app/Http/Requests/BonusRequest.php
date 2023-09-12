<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BonusRequest extends FormRequest
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
            'totalBonus' => ['required', 'numeric'],
            'percentage1' => ['required', 'numeric'],
            'percentage2' => ['required', 'numeric'],
            'percentage3' => ['required', 'numeric'],
        ];
    }
}
