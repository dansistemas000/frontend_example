<?php

use Illuminate\Support\Facades\Route;
use App\Http\Core\Domain\Users;
use App\Http\Core\Domain\Posts;
use App\Http\Core\Domain\Albums;
use App\Http\Core\Domain\Photos;
use App\Models\TableLogs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('welcome');
});

Route::get('users', function () {

    $users = new Users();

    $dataUsers = $users->getUsers();

    $collection = json_decode($dataUsers);

    return view('users',["collection"=>$collection]);
});

Route::get('tableLogs', function () {

    $data = TableLogs::select("id","request_type as Tipo petición",
                            "id_type as tipo id",
                            "request_id as id de petición",
                            "response_total as total elementos",
                            "request_date as hora y fecha")->get()->toArray();

    if($data){
        $headers = array_keys($data[0]);
    }else{
        $headers = [];
    }

    

    return view('logs',["data"=>$data,"headers"=>$headers]);
});

Route::get('showPosts/{userId}/', function ($userId) {

    $posts = new Posts($userId);

    $dataPosts = $posts->getPosts();

    $collection = json_decode($dataPosts);

    return view('posts',["collection"=>$collection]);
});

Route::get('showAlbums/{userId}/', function ($userId) {

    $albums = new Albums($userId);

    $dataAlbums = $albums->getAlbums();

    $collection = json_decode($dataAlbums);

    return view('albums',["collection"=>$collection]);
});

Route::get('showPhotos/{albumId}/', function ($albumId) {

    $photos = new Photos($albumId);

    $dataPhotos = $photos->getPhotos();

    $collection = json_decode($dataPhotos);

    return view('photos',["collection"=>$collection]);
});







