<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MercenaryStatRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'HSID' => 'required',
					'str' => 'required|integer|min:0|max:65530',
					'int' => 'required|integer|min:0|max:65530',
					'dex' => 'required|integer|min:0|max:65530',
					'vit' => 'required|integer|min:0|max:65530',
					'mana' => 'required|integer|min:0|max:65530',
					'points' => 'required|integer|min:0|max:65530',
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
					'HSID' => 'Mercenary',
					'str' => 'Strength',
					'int' => 'Intelligence',
					'dex' => 'Dexterity',
					'vit' => 'Vitality',
					'mana' => 'Mana',
					'points' => 'Points Remaining',
		];
	}
}
