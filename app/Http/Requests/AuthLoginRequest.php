<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
      'email' => ['required', 'email:rfc,dns'],
      'password' => ['required'],
    ];
  }

  public function messages()
  {
    return [
      'email.required' => 'Campo obrigatório.',
      'email.email' => 'Preencha um e-mail válido.',
      'password.required' => 'Campo obrigatório.',
    ];
  }
}
