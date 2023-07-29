<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class KlasifikasiRequest extends FormRequest
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
            'kode' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'uraian' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'kode diperlukan.',
            'uraian.required' => 'uraian diperlukan.',
        ];
    }
    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['kode', 'uraian'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
