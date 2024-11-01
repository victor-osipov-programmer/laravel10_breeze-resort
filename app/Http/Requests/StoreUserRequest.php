<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'fio' => ['required', Rule::unique('users'), 'string'],
            'email' => ['required', Rule::unique('users'), 'string'],
            'phone' => ['required', Rule::unique('users'), 'string'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'id_childdata' => ['required', Rule::exists('rooms', 'id')],
        ];
    }
}
