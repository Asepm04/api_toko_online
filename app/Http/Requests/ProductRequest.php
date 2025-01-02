<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name_product" => ["required"],
            "kategori" => ["required"],
            "stock" => ["required"],
            "price" => ["required"],
            "image" => ["required","file"],
        ];
    }

    public function failedValidation(Validator $validator )
    {
        throw new HttpResponseException(
            response()->json([$validator->getMessageBag()],400)
        );
    }


}
