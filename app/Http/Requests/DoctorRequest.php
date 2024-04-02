<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $userId = Auth::guard('customer')->id();

        return [
            'name' => [
                'required',
                'min:3',
                'max:50',
                Rule::unique('customers')->ignore($userId),
            ],
            'email' => [
                'required',
                Rule::unique('customers')->ignore($userId),
            ],
        ];
    }
}
