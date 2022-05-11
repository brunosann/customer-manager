<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'name' => ['required'],
            'doc' => ['nullable', "unique:clients,cpf/cnpj,{$id},id"],
        ];
    }

    public function messages()
    {
        $typeDoc = $this->type === 'FISICA' ? 'Cpf' : 'Cnpj';

        return [
            'doc.unique' => "Esse {$typeDoc} já esta sendo utilizado.",
        ];
    }
}
