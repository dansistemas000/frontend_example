<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;

class Photos{

    private $path = Paths::PLACEHOLDER.'photos/';
    private $albumId;
    private $photosArray = [];

    public function __construct($albumId)
    {
        $this->albumId = $albumId;
    }

    public function getPhotos(){

        $responseWebService = new WebServiceData($this->path.$this->albumId);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        $this->responseTotal = count($data);

        foreach($data as $value){

            array_push($this->photosArray,array("title"=>$value->title,"url"=>$value->url,"thumbnailUrl"=>$value->thumbnailUrl));
        }

        return  json_encode($this->photosArray);

    }

}