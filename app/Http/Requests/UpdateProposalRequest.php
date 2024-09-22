<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_organisasi' => 'required',
            'alamat_organisasi' => 'required',
            'no_telp_organisasi' => 'required',
            'email_organisasi' => 'required|email',
            'peruntukan' => 'required',
            'nilai' => 'required',
            'lampiran' => 'nullable|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'nama_organisasi.required' => 'Nama Badan / Lembaga / Organisasi Kemasyarakatan Harus Diisi.',
            'alamat_organisasi.required' => 'Alamat Harus Diisi.',
            'no_telp_organisasi.required' => 'Nomer Telp Harus Diisi.',
            'email_organisasi.required' => 'Email Harus Diisi.',
            'email_organisasi.email' => 'Format Email Tidak Valid.',
            'peruntukan.required' => 'Peruntukan Harus Diisi.',
            'nilai.required' => 'Nilai Proposal Harus Diisi.',
            'lampiran.required' => 'Lampiran Harus Diisi.',
            'lampiran.mimes' => 'Lampiran Hanya Boleh File PDF.',
        ];
    }
}
