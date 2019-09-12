<?php

namespace App\Imports;

use App\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithValidation
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $usuario = User::where('email',$row[2])->first();

        if ($usuario) {
            return null;
        }

        return new User([
            'rol_id'   => 3,
            'name'     => $row[0],
            'apellido' => $row[1],
            'email'    => $row[2],
            'tipo_doc' => $row[3],
            'documento'=> $row[4],
            'password' => 'x',
        ]);
    }

    public function rules(): array
    {
        return [

            '*.2' => [ 'required', 'email'],

            /*
            '*.0' => [ 'required', 'email', function($attribute, $value, $onFailure) {

                $usuario = User::where('email',$value)->first();

                if ($usuario) {
                   $onFailure('El correo '.$value.' ya se encuentra ingresado');
                }
            }],
            */

        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return ['2' => 'email'];
    }




}
