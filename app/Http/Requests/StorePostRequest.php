<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'sometimes|nullable|string',
            'description' => 'sometimes|nullable|string',
            'website_id' => 'integer|exists:websites,id',
        ];
    }
}
