<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == "PUT")
            return [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->user)],
                'password' => ['required'],
                'is_admin' => ['required']
            ];

        elseif ($method == "PATCH")
            return [
                'first_name' => ['sometimes', 'string', 'max:255'],
                'last_name' => ['sometimes', 'string', 'max:255'],
                'address' => ['sometimes', 'string', 'max:255'],
                'email' => ['sometimes', 'email', Rule::unique(User::class)->ignore($this->user)],
                'password' => ['sometimes'],
                'is_admin' => ['sometimes']
            ];

        else
            return [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required'],
                'is_admin' => ['required']
            ];
    }
}
