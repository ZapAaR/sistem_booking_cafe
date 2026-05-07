<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MejaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomor_meja' => [Rule::unique('mejas')->ignore($this->route('meja')?->id)],
            'kapasitas' => 'required|integer|min:1|max:50',
            'status' => 'required|string|in:tersedia,terisi,maintenance',
            'lokasi' => 'nullable|string|in:indoor,outdoor,rooftop',
            'deskripsi' => 'nullable|string',
        ];
    }
}
