<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;
use App\Http\Core\Domain\Log;

class Users{

    private $path = Paths::PLACEHOLDER.'users';

    private $usersArray = [];

    public function getUsers(){

        $responseWebService = new WebServiceData($this->path);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        foreach($data as $value){

            array_push($this->usersArray,array("id"=>$value->id,"name"=>$value->name));
        }

        return  json_encode($this->usersArray);
    }
    
}