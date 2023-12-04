<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:300|min:5',
                'weight' => 'required|max:300|min:1|numeric',
                'length' => 'required|max:300|min:1|numeric',
                'width' => 'required|max:300|min:1|numeric',
                'height' => 'required|max:300|min:1|numeric',
                'price' => 'required|numeric',
                'category_id' => 'required|min:1|max:1000000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|max:1000000000|regex:/^[0-9]+$/u|exists:brands,id',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'published_at' => 'required|numeric',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:300|min:5',
                'weight' => 'required|max:300|min:1|numeric',
                'length' => 'required|max:300|min:1|numeric',
                'width' => 'required|max:300|min:1|numeric',
                'height' => 'required|max:300|min:1|numeric',
                'price' => 'required|numeric',
                'category_id' => 'required|min:1|max:1000000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|max:1000000000|regex:/^[0-9]+$/u|exists:brands,id',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'published_at' => 'numeric',
            ];
        }
    }
}
