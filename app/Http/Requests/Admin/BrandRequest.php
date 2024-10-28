<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $brandId = $this->route('brand') ?? null;

        return [
            'name'         => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands','name')->ignore($brandId),
            ],
            'logo'         => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'banner_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,ico|max:2048',
            'url'          => 'nullable|url|max:255',
            'status'       => 'required|in:inactive,active',
        ];
    }
}
