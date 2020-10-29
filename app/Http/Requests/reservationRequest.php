<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reservationRequest extends FormRequest
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
            'user_id' => ['required', 'unique:reservation_models', 'digits:10'],
            'your_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date' => ['required', 'date'],
            'time_category' => ['required', 'integer'],
            'caution' => ['required', 'accepted'],
        ];
    }
}
