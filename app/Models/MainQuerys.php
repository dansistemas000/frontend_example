<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;



class MainQuerys extends Model {

    // obtiene request id de la ultima campaña
    static function getLastRequestId($request_reference){
        $data = DB::select("SELECT REQUEST_ID 
                                FROM TMP_REQUEST_REFINANCING 
                                WHERE REQUEST_REFERENCE = '".$request_reference."' AND 
                                SUBSTRING(CAMPAIGN_ID,4) = (SELECT MAX(SUBSTRING(CAMPAIGN_ID,4)) 
                                                    FROM TMP_REQUEST_REFINANCING 
                                                WHERE REQUEST_REFERENCE ='".$request_reference."')");
        return $data;
    }
    
}