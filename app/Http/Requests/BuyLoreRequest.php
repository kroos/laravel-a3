<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyLoreRequest extends FormRequest
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
					'lore' => 'required|integer|min:0',

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
					'lore' => 'Lore',
		];
	}
}
