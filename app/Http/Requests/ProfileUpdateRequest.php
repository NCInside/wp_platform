<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'nim' => ['max:13', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['string', 'email', 'ends_with:student.ciputra.ac.id', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'photo' => ['image', 'file', 'max:4000']
        ];
    }
}
