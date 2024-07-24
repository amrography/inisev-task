<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeWebsiteRequest extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'website_id' => 'required|integer|exists:websites,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
