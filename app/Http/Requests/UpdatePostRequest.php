<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePostRequest extends FormRequest
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
        return [
            "title" => ["string", "max:50"],
            "slug" => ["string"],
            "description" => ["string"],
            "content" => ["string"],
        ];
    }

    public function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title . ' ' . uniqid()),
        ]);
    }
}
