<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PengadaanBarangRequest extends FormRequest
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
            'jumlah' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'penanggung_jawab' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
        ];
    }

    public function messages(): array
    {
        return [
            'namabarang.required' => 'nama barang diperlukan.',
            'jumlah.required' => 'jumlah diperlukan.',
            'penanggung_jawab.required' => 'penanggung jawab diperlukan.',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['namabarang', 'jumlah', 'penanggung_jawab'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
