<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Check if the route is for search
        if ($this->routeIs('tasks.search')) {
            return $this->searchRules();
        }

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date'],
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'in:pending,in-progress,completed'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
    }


    private function searchRules(): array{
        return [
            'title'=> ['nullable','string',''],
            'status' => ['nullable','in:pending,in-progress,completed'],
            'category_id' => ['nullable', 'exists:categories,id']
        ];
    }
}
