<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TEMP: real permission checks come in Phase 7 (Policies)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'manager_id'  => ['required', Rule::exists('users', 'id')->where('role', UserRole::Manager->value)->whereNull('deleted_at')],
            'due_date'    => ['nullable', 'date'],
            'approver_ids'   => ['nullable', 'array'],
            'approver_ids.*' => [Rule::exists('users', 'id')->where('role', UserRole::Developer->value)->whereNull('deleted_at')],
        ];
    }
}
