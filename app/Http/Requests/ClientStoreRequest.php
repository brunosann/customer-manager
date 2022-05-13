<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClientStoreRequest extends FormRequest
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
        $userId = Auth::user()->id;

        return [
            'name' => ['required'],
            'doc' => [
                'nullable',
                Rule::unique('clients', 'cpf/cnpj')->where(fn ($query) => $query->where('user_id', $userId))
            ],
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
