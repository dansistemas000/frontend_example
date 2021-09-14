<?php

namespace App\Http\Core\Aplication;

interface Log{

    public function __construct($folder);

    public function writeLog($text);


}