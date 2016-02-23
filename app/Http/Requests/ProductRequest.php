<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->merge(['featured'=>$this->input('featured',0)]);
        $this->merge(['recommend'=>$this->input('recommend',0)]);

        return [
            'category_id'=>'required',
            'name'=>'required|min:5',
            'description'=>'required',
            'price'=>'required|numeric',

        ];
    }
}
