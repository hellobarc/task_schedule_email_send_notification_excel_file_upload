<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
        'name'     => $row['name'],
           'email'    => $row['email'],
           'password' => Hash::make($row['password']),
           'date_of_birth' => $row['date_of_birth'],
        ]);
    }
}
