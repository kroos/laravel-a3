<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MercEditLevelRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'c_id' => 'required',
					'HSID' => 'required',
					'HSExp' => 'required'
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
					'c_id' => 'Hero',
					'HSID' => 'Mercenary',
					'HSExp' => 'Level',
		];
	}
}
