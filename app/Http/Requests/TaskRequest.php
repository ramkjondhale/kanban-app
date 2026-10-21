<?php

namespace App\Http\Requests;

use App\Enums\TaskPriority;
use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority'    => ['required', Rule::enum(TaskPriority::class)],
            'assigned_to' => ['required', Rule::exists('users', 'id')->where('role', UserRole::Developer->value)->whereNull('deleted_at')],
            'due_date'    => $this->isMethod('post') ? ['nullable', 'date', 'after_or_equal:today'] : ['nullable', 'date'],
            'tags'        => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'assigned_to.required' => 'Please choose a developer.',
            'assigned_to.exists'   => 'The selected user is not an active developer.',
        ];
    }
}
