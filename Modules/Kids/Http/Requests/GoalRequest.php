<?php

namespace Modules\Kids\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'target' => ['required','string'],
            'stimulus' => ['required','string'],
        ];
    }
    public function messages(): array
    {
        return [
            'target.required' => 'الهدف مطلوبة',
            'stimulus.required' => 'المثير مطلوبة',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
