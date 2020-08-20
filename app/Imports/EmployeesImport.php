<?php

namespace GKBLAB\Imports;

use GKBLAB\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $employee = Employee::updateOrCreate([
            'first_name' => $row[1],
            'last_name' => $row[2], 
            'email' => $row[3], 
            'hobbies' => $row[4], 
            'gender' => $row[5],
            'picture' => $row[6],
        ]);
        return $employee;
    }
}
