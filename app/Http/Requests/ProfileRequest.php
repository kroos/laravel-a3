<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'c_sheadera' => 'required|string|max:100',
					'c_headerb' => 'required|email|unique:Account,c_headerb,'.$this->account['c_id'].',c_id',
					'curr_c_headera' => 'required_with_all:c_headera',
					'c_headera' => 'required_with_all:curr_c_headera|nullable|min:8|confirmed',
		];
	}

	// public function messages()
	// {
	// 	return [
	// 				'c_sheadera.required' => '',
	// 				'c_headerb.required' => '',
	// 	];
	// }

	public function attributes()
	{
		return [
					'c_sheadera' => 'Name',
					'c_headerb' => 'Email Address',
					'c_headera' => 'Password',
					'curr_c_headera' => 'Current Password',
					'c_headera' => 'Password',
					'c_headera_confirmation' => 'Password Confirmation',
		];
	}
}
