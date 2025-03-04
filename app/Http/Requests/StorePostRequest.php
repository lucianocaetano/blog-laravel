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
            "categories" => ["required", "array", 'min:1', 'max:10' ],
            "categories.*" => ["max:50", "exists:categories,slug"],
            "slug" => ["required", "string"],
            "description" => ["required", "string"],
            "content" => ["required", "string"],
        ];
    }

    public function messages()
    {

        $messages = [
        ];

        foreach ($this->get('categories') as $key => $val) {
            $messages["categories.".$key.".exists"] = "The selected categories. $val is invalid.";
        }

        return $messages;
    }

    public function prepareForValidation()
    {
        $categories = [];

        if ($this->get('categories')) {
            foreach (array_map('trim', explode(',', $this->get('categories'))) as $category) {
                $categories[] = str($category)->slug();
            }
        }

        $this->merge([
            'slug' => Str::slug($this->title . ' ' . uniqid()),
            'categories' => !empty($categories) ? $categories : null,
        ]);
    }
}
