<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'vehicle' => 'required|numeric',
            'user_id' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'approved_by' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];


        return $rules;
    }

    public function attributes()
    {
        return [
            'vehicle.required' => 'The vehicle is required.',
            'vehicle.numeric' => 'The vehicle is required.',
            'user_id.required' => 'The user is required.',
            'user_id.numeric' => 'The user must be a number.',
            'branch_id.required' => 'The branch office is required.',
            'branch_id.numeric' => 'The branch office must be a number.',
            'approved_by.required' => 'The approved is required.',
            'approved_by.numeric' => 'The approved by must be a number.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
        ];
    }
}
