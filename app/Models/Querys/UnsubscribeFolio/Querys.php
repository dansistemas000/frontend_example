<?php

namespace App\Models\Querys\UnsubscribeFolio;
use DB;
use Illuminate\Database\Eloquent\Model;


/**
 * Querys: Clase con consultar del modulo Dar de Baja Folios
 */
class Querys extends Model {
        
    /**
     * updateTmpRequestRefinancing: Actualiza fecha limite de recuperacion dos dias atras de la fecha actual en la tabla TMP_REQUEST_REFINANCING 
     *
     * @param  mixed String $requestId: Numero de solicitud
     * @return void
     */
    static function updateTmpRequestRefinancing($requestId){
		$status = DB::UPDATE("UPDATE TMP_REQUEST_REFINANCING SET ".
							"DATELIMITRECOVERY = SYSDATE-2 ".
							"WHERE REQUEST_ID = '".$requestId."'");
		
		return $status;
	}
	
	/**
	 * updateTreqLoanCma: Actualiza fecha limite de recuperacion dos dias atras de la fecha actual en la tabla TREQ_LOAN_CMA 
	 *
	 * @param  mixed String $requestId: Numero de solicitud
	 * @return void
	 */
	static function updateTreqLoanCma($requestId){
		$status = DB::update("UPDATE TREQ_LOAN_CMA SET ".
							"DATELIMITRECOVERY = SYSDATE-2 ".
							"WHERE REQUEST_ID = '".$requestId."'");
		return $status;
	}
}