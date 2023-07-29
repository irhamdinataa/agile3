<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DokumenRequest extends FormRequest
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
            'klasifikasi_id' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'tanggal_dokumen' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'tanggal_diterima' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'perihal' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'users_id' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'lampiran' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'klasifikasi_id.required' => 'klasifikasi diperlukan.',
            'tanggal_dokumen.required' => 'tanggal dokumen diperlukan.',
            'tanggal_diterima.required' => 'tanggal diterima diperlukan.',
            'perihal.required' => 'perihal diperlukan.',
            'lampiran.required' => 'lampiran diperlukan.',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['klasifikasi_id', 'tanggal_dokumen', 'tanggal_diterima', 'perihal', 'users_id', 'lampiran'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
