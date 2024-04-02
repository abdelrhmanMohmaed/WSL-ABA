<?php

namespace Modules\Kids\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomplishedGoalsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'mastery' => ['required'],
            'description' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'mastery.required' => 'الأتقان مطلوب',
            'description.required' => 'التقرير مطلوب',
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
