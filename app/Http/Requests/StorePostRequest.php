<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
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
            "title" => ["required", "string", "max:50"],
            "slug" => ["required", "string"],
            "description" => ["required", "string"],
            "content" => ["required", "string"],
        ];
    }

    public function prepareForValidation() {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}
