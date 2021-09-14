<?php

namespace App\Http\Core\Aplication;

interface ReadFile{

    function __construct($file);

    public function getHeaders();

    public function getData($headers);
    
}