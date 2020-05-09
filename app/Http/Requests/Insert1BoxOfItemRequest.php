<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Insert1BoxOfItemRequest extends FormRequest
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
					'box.*.item' => 'required',
					'box.*.slot' => 'required',
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
					'c_id' => 'Hero',
					'box.*.item' => 'Box of Item',
					'box.*.slot' => 'Inventory Slot',		];
	}
}
