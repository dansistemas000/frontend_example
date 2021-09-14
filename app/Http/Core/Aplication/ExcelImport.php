<?php

namespace App\Http\Core\Aplication;

use Maatwebsite\Excel\Concerns\ToArray;

class ExcelImport implements ToArray{

    public function Array(Array $rows){
        return $rows;
    }

}
