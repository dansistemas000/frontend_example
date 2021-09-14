<?php

namespace App\Http\Core\Domain\UnsubscribeFolio;
use App\Models\Querys\MainQuerys;
use App\Models\Querys\UnsubscribeFolio\Querys;
use App\Http\Core\Aplication\BinnaclesLogImpl as BinnaclesLog;
use App\Http\Core\Domain\Headers;

/**
 * UnsubscribeFolio: Clase para dar de baja folios actualizando fechas
 */
class UnsubscribeFolio{
    
	private $binnacleLog;
	
	/**
	 * __construct: se inicializa el log de bitacora agregando el encabezado
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->binnacleLog = new BinnaclesLog('unsubscribe_folio');
		$this->binnacleLog->setHeader(Headers::HEADERFOLIOSLOG);
	}
    
    /**
     * proccess: Proceso que busca el id unico que es: request_id y con ese id actualiza las fechas necesarias
     *
     * @param  mixed Array $data: Arreglo de los registros que se actualizaran
     * @return Array
     */
    public function proccess($data){
		$success = 0;
		$errors = 0;
		
		foreach($data as $value){

			$responseId = MainQuerys::getLastRequestId($value["no solicitud"]);

			if($responseId){
				$requestId = $responseId[0]->request_id;
				$response = $this->changeDates($requestId);
				if($response["status"]){
					$statusProccess = "Fechas actualizadas";
					$success++;
				}else{
					$statusProccess = $response["message"];
					$errors++;
				}
				$this->binnacleLog->writeLog($value["no solicitud"].",".$requestId.",".$statusProccess);
			}else{
				$errors++;
				$this->binnacleLog->writeLog($value["no solicitud"].",,Request_id no encontrado.");
			}
	
		}

		return array("success"=>$success,"errors"=>$errors);
        
    }
    
    /**
     * changeDates: Actualiza las fechas de las tablas TmpRequestRefinancing y TreqLoanCma
     *
     * @param  mixed $requestId: numero de  solicitud
     * @return Array
     */
    private function changeDates($requestId){

		$status = Querys::updateTmpRequestRefinancing($requestId);
		if($status){
			$status = Querys::updateTreqLoanCma($requestId);
			if($status){
				return array('status' => true, 'message' => '');
			}else{
				return array('status' => false, 'message' => 'Error al actualizar en TREQ_LOAN_CMA');
			}
		}else{
			$status = Querys::updateTreqLoanCma($requestId);
			if($status){
				return array('status' => false, 'message' => 'Error al actualizar en TMP_REQUEST_REFINANCING');
			}else{
				return array('status' => false, 'message' => 'Error al actualizar en TMP_REQUEST_REFINANCING y TREQ_LOAN_CMA');
			}
		}
	}

}