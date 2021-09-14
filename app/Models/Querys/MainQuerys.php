<?php

namespace App\Models\Querys;
use DB;
use Illuminate\Database\Eloquent\Model;



/**
 * MainQuerys: Clase donde se almacenan consultas generales del proyecto
 */
class MainQuerys extends Model {

        
    /**
     * getLastRequestId: Obtiene el request_id de la ultima campaña
     *
     * @param  mixed String $request_reference: Numero de referencia
     * @return void
     */
    static function getLastRequestId($request_reference){
        $data = DB::select("SELECT REQUEST_ID 
                                FROM TMP_REQUEST_REFINANCING 
                                WHERE REQUEST_REFERENCE = '".$request_reference."' AND 
                                TO_NUMBER(SUBSTR(CAMPAIGN_ID,4)) = (SELECT MAX(TO_NUMBER(SUBSTR(CAMPAIGN_ID,4))) 
                                                                        FROM TMP_REQUEST_REFINANCING 
                                                                    WHERE REQUEST_REFERENCE ='".$request_reference."')");
        return $data;
    }
    
}