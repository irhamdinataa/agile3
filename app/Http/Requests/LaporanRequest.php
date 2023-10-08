<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LaporanRequest extends FormRequest
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
            'jenis' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'judul' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'prodi' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'dosen' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'jurnal' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'],
            'laporan' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'email diperlukan.',
            'nama.required' => 'nama diperlukan.',
            'npm.required' => 'NPM diperlukan.',
            'prodi.required' => 'program studi diperlukan.',
            'jenis.required' => 'jenis laporan diperlukan.',
            'judul.required' => 'judul laporan diperlukan.',
            'dosen.required' => 'dosen diperlukan.',
            'jurnal.required' => 'file jurnal diperlukan.',
            'laporan.required' => 'file laporan diperlukan.',
            'jurnal.mimetypes' => 'file jurnal harus berupa word atau pdf.',
            'laporan.mimetypes' => 'file laporan harus berupa word atau pdf.',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['email', 'nama', 'npm', 'prodi' ,'jenis','judul','dosen', 'jurnal','laporan'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
