<?php

namespace App\Http\Requests\Admin\User;

use App\Dtos\Admin\UserFormDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'starts_with:380', 'digits:12', 'unique:users,phone,'.$this->user->id],
        ];
    }

    public function getDto(): UserFormDto
    {
        return new UserFormDto(
            $this->name,
            $this->phone,
        );
    }
}
