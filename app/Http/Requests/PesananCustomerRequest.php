<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PesananCustomerRequest extends FormRequest
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
            'namabarang' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'kebutuhan' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'done' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'todo' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
        ];
    }

    public function messages(): array
    {
        return [
            'namabarang.required' => 'nama barang diperlukan.',
            'kebutuhan.required' => 'kebutuhan diperlukan.',
            'done.required' => 'done diperlukan.',
            'todo.required' => 'to do diperlukan.',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['namabarang', 'kebutuhan', 'done', 'todo'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
