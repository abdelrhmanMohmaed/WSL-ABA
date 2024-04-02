<?php

namespace Modules\Kids\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'indoctrinationType' => ['required'],
            'percentage' => ['required'],
//            'description' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'indoctrinationType.required' => 'نوع التلقين مطلوب',
            'percentage.required' => 'نسبة الاستجابة مطلوبة',
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
