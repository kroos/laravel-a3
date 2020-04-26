<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'subject' => 'required|string|max:100',
					'post' => 'required',
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
					'category_id' => 'Category',
					'post' => 'Post',
					'subject' => 'Subject',
		];
	}
}
