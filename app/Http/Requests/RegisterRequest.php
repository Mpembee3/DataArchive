<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

            'fname'  => 'required|string|max:25',
            'lname'  => 'required|string|max:25',
            'email'  => 'required|string|unique:members,email',
            'address'  => 'required|string|max:255',
            'phone'  => 'required|string|min:10|max:15|unique:members,phone',
            'gender' =>  'Required|in:Male,Female',
            'birthdate' => 'required|date',
            'supervisor_id' => 'nullable|exists:users,id',
            'marital_status' => 'required|in:Single,Married',
        ];
    }

    public function messages(){

        return[

            'fname.required' => 'Please enter your first name.',
            'fname.max' => 'First name must not exceed 25 characters.',
            
            'lname.required' => 'Please enter your last name.',
            'lname.max' => 'Last name must not exceed 25 characters.',
            
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            
            'phone.required' => 'Please enter your phone number.',
            'phone.min' => 'Phone number must not exceed 10 characters.',
            'phone.max' => 'Phone number must not exceed 15 characters.',
            
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Please select a valid gender option.',
            
            'birthdate.required' => 'Please enter your date of birth.',
            'birthdate.date' => 'Please enter a valid date of birth.',
            // 'birthdate.before' => 'Date of birth must be before today.',
            
            'supervisor_id.exists' => 'Please select a valid supervisor.',
            
            'address.required' => 'Please enter your address.',
            'address.max' => 'Address must not exceed 255 characters.',
            
            'marital_status.required' => 'Please select your marital status.',
            'marital_status.in' => 'Please select a valid marital status option.',

        ];

    }
}
