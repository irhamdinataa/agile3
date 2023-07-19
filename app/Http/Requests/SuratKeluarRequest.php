<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SuratKeluarRequest extends FormRequest
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
            'nomor_surat' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'tujuan_surat' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'klasifikasi_id' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'tanggal_surat' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'tanggal_catat' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'perihal' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'users_id' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes')],
            'lampiran' => [Rule::when($this->isMethod('POST'), 'required', 'sometimes'), 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf', 'max:5000'],
        ];
    }
    public function prepareForValidation()
    {
        if ($this->isMethod('patch')) {
            $fields = ['nomor_surat', 'tujuan_surat', 'klasifikasi_id', 'tanggal_surat', 'tanggaL_catat', 'perihal', 'users_id', 'lampiran'];

            foreach ($fields as $key) {
                if ($this->input($key) === null) {
                    $this->request->remove($key);
                }
            }
        }
    }
}
