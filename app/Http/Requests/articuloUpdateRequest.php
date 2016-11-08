<?php

namespace cop1\Http\Requests;

use cop1\Http\Requests\Request;

class articuloUpdateRequest extends Request
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
        return [
            'descripcion'   => 'required',
            'modelo'        => 'required',
            'precio'        => 'required',
            'existencia'    => 'required',
        ];
    }
}
