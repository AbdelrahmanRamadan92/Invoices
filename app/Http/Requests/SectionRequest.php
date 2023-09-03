<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'section_name' => [
                'required',
                'unique:sections,section_name',
                'min:3',
                'max:50',
            ],
            'description' => [
                'required',
            ],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'section_name.required' => 'اسم القسم مطلوب',
            'section_name.unique' => 'اسم القسم مسجل مسبقا',
            'section_name.max' => 'اسم القسم لا يجب ان يتعدى خمسون حرف',
            'section_name.min' => 'اسم القسم لا يجب ان يقل عن ثلاثة احرف ',
            'description.required' => 'وصف القسم مطلوب',
        ];
    }
}
