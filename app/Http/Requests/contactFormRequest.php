<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact_category' => ['required'],
            'contents' => ['required', 'string', 'max:500'],
            'caution' => ['required', 'accepted'],
        ];
    }
}
