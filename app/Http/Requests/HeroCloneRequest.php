<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroCloneRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'c_id1' => 'required|different:c_id2',
					'c_id2' => 'required|different:c_id1',
					// 'category_id' => 'required|integer'
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
					'c_id1' => 'Hero (Source)',
					'c_id2' => 'Hero (Target)',
		];
	}
}
