<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;

class Posts{

    private $path = Paths::PLACEHOLDER.'posts/';
    private $userId;
    private $postsArray = [];

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getPosts(){

        $responseWebService = new WebServiceData($this->path.$this->userId);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        foreach($data as $value){

            array_push($this->postsArray,array("title"=>$value->title,"body"=>$value->body));
        }

        return  json_encode($this->postsArray);
    }
    
}