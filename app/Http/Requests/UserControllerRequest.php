<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserControllerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required'
        ];
    }
}
