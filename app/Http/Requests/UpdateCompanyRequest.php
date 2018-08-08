<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; // todo add authorization
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name' => 'required|max:100',
            'email' => 'nullable|string|max:100',
            'logo' => 'sometimes|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'website' => 'nullable|string|max:300',
		];
	}

	/**
     * Modify attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'name'
        ];
    }
}
