<?php

namespace App\Http\Requests;

use App\Rules\ImagenUnique;
use App\Model\Eventos\Evento;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => [
                'required'
            ],  
            'imagen' => [
                'required', new ImagenUnique
            ],                       
        ];
    }
}