<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->account['c_headerb']);
		return [
					'post_id' => 'required|integer',
					'comment' => 'required',
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
					'post_id' => 'Post Category',
					'comment' => 'Comment',
		];
	}
}
