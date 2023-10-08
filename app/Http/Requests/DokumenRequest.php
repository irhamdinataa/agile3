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
            'email' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'),'email'],
            'nama' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'npm' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'prodi' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'dosen' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'jurnal' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf', 'max:5000'],
            'laporan' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'email diperlukan.',
            'nama.required' => 'nama diperlukan.',
            'npm.required' => 'npm diperlukan.',
            'jenis.required' => 'jenis diperlukan.',
            'prodi.required' => 'program studi diterima diperlukan.',
            'dosen.required' => 'perihal diperlukan.',
            'jurnal.required' => 'lampiran diperlukan.',
            'laporan.required' => 'lampiran diperlukan.',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['email', 'nama', 'npm','jenis', 'prodi', 'dosen', 'jurnal','laporan'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
