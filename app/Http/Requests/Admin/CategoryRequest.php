<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
    // public function rules(): array
    // {
    //     $categoryId = $this->route('category') ?? null;
        // switch ($this->method()) {
        //     case 'POST':
        //     case 'PUT':
        //     case 'PATCH':
                // return [
                //     'name'         => [
                //         'required',
                //         'string',
                //         'max:255',
                //         Rule::unique('categories', 'name')->ignore($categoryId),
                //     ],
                //     'parent_id'    => 'nullable|exists:categories,id',
                //     'logo'         => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
                //     'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
                //     'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
                //     'url'          => 'nullable|url|max:255',
                //     'status'       => 'required|in:inactive,active',
                // ];

            // case 'DELETE':
            //     return [];
            // default:
            //     return [];
        // }
    // }

    public function rules(): array
    {
        $categoryId = $this->route('category') ?? null;

        return [
            'name'         => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($categoryId),
            ],
            'parent_id'    => 'nullable|exists:categories,id',
            'logo'         => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'status'       => 'required|in:inactive,active',
        ];
    }
}
