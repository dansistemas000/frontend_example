<?php

namespace App\Http\Controllers\UnsubscribeFolio;

use Illuminate\Http\Request;
use App\Http\Core\Aplication\ReadFileTxtImpl;
use App\Http\Core\Aplication\ReadFileExcelImpl;
use App\Http\Core\Aplication\Utils;
use App\Http\Core\Domain\Headers;
use App\Http\Core\Aplication\ErrorsLogImpl as ErrorsLog;
use App\Http\Core\Domain\UnsubscribeFolio\UnsubscribeFolio;
use App\Http\Controllers\Controller;


/**
 * UnsubscribeFolioController: Controlador para validar y enviar datos procesados a regla de negocio
 */
class UnsubscribeFolioController extends Controller {

	private $headers;
	private $data;
	private $mainHeaders;
	
	/**
	 * store: Recibe los parametros POST en este caso el archivo a procesar y el tipo de archivo
	 *
	 * @param  mixed Request $request: datos POST
	 * @return Array
	 */
	public function store(Request $request) {
		
		if($request->hasFile('file')){
			try{
				$this->mainHeaders = Utils::arrayToLowecase(Headers::HEADERFOLIOS);

				if($request["file-type"] == "excel"){
					$readFile = new ReadFileExcelImpl($request->file('file'));
				}else{
					$readFile = new ReadFileTxtImpl($request->file('file'));
					$readFile->setDelimiter("\t");
				}

				$this->headers = $readFile->getHeaders();
				$this->data = $readFile->getData($this->headers);

				$statusCompareHeaders = Utils::compareHeaders($this->mainHeaders,$this->headers);
				
				if($statusCompareHeaders["status"]){

					$unsubscribeFolio = new UnsubscribeFolio();
					
					$proccess = $unsubscribeFolio->proccess($this->data);
					if($proccess["errors"] > 0){
						$error_message = "<span class='error-message'>folio(s) con error(es): ".$proccess["errors"]."</span>";
					}else{
						$error_message = "";
					}
					
					return array('status' => true, 'message' => "folio(s) dado(s) de baja: ".$proccess["success"]."<br>".$error_message);
				}else{
					$message = "La columna o cabecera (".$statusCompareHeaders["header"].") en la posición: ".$statusCompareHeaders["position"]." no se encuentra en el archivo.";
					return array('status' => false, 'message' => $message);
				}
			}catch(\Exception $ex){
				$errorsLog = new ErrorsLog("unsubscribe_folio");
				$errorsLog->writeLog("error: ".$ex);
				return array('status' => false, 'message' => "Error de sistema, intente de nuevo o reportelo al área de sistemas.",'exception'=>'error :'.$ex);
			}


		}else{
			return array('status' => 'error', 'message' => 'Error, No se cargo archivo intente de nuevo o reportelo a sistemas.');
		}
	}

}
