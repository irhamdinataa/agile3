<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'role' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'string'],
            'name' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'string', 'max:255'],
            'email' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'email'],
            'password' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'alpha_dash'],
            'foto_profile' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'max:5000'],
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'nama diperlukan.',
            'email.required' => 'email diperlukan.',
            'password.required' => 'password diperlukan.',
            'foto_profile.required' => 'foto profile diperlukan.',
            'role.required' => 'tipe karyawan diperlukan.',

        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('PATCH')) {
            $fields = [
                'role',
                'name',
                'email',
                'password',
                'foto_profile',
            ];

            foreach ($fields as $field) {
                if ($this->input($field) === null){
                    $this->request->remove($field);
                }

            }

        }
    }
}
