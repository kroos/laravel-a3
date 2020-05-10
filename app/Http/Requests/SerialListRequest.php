<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerialListRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'SerialNo' => 'required|unique:SerialList,SerialNo',
					'ItemInfo' => 'required',
					'Parameter1' => 'required',
					'Parameter2' => 'required',
					'Type' => 'required',
					'UsedFlag' => 'required',
					'ExpireDate' => 'required|date',
					// 'm_body' => 'required',
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
					'SerialNo' => 'Serial Number',
					'ItemInfo' => 'Item Information',
					'Parameter1' => 'First Parameter',
					'Parameter2' => 'Second Parameter',
					'Type' => 'Type',
					'UsedFlag' => 'Used Flag',
					'ExpireDate' => 'Expiry Date',
					// 'm_body' => 'Armor',
		];
	}
}
