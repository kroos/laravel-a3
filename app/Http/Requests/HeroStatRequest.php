<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroStatRequest extends FormRequest
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
					'c_id' => 'Hero',
					'str' => 'Strength',
					'int' => 'Intelligence',
					'dex' => 'Dexterity',
					'vit' => 'Vitality',
					'mana' => 'Mana',
					'points' => 'Points Remaining',
		];
	}
}
