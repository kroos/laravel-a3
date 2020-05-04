<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanAccountRequest extends FormRequest
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
					'ban' => 'required',
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
					'ban' => 'Roles',
					'int' => 'Intelligence',
					'dex' => 'Dexterity',
					'vit' => 'Vitality',
					'mana' => 'Mana',
					'points' => 'Points Remaining',
		];
	}
}
