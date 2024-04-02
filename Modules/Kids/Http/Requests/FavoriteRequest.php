<?php

namespace Modules\Kids\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FavoriteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstTitle' => ['required'],
            'secondTitle' => ['required'],
            'thirdTitle' => ['required'],
            'fourthTitle' => ['required'],
            'fifthTitle' => ['required'],
            'sixthTitle' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstTitle.required' => 'المفضل الاولى مطلوبة',
            'secondTitle.required' => 'المفضل الثاني مطلوبة',
            'thirdTitle.required' => 'المفضل الثالث مطلوبة',
            'fourthTitle.required' => 'المفضل الرابع مطلوبة',
            'fifthTitle.required' => 'المفضل الخامس مطلوبة',
            'sixthTitle.required' => 'المفضل السادس مطلوبة',
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public
    function authorize(): bool
    {
        return true;
    }
}
