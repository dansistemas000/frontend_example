<?php

namespace App\Http\Core\Aplication;
use App\Http\Core\Aplication\ReadFile;
use App\Http\Core\Aplication\Utils;
use App\Http\Core\Aplication\ErrorsLogImpl as Log;

/**
 * ReadFileTxtImpl: Clase para leer archivos de texto
 */
class ReadFileTxtImpl implements ReadFile{

	private $file;
	private $line;
	private $delimiter;
	
	/**
	 * __construct: se carga el archivo en el constructor para poder leerlo.
	 *
	 * @param  mixed File $file: Archivo de text cargado.
	 * @return void
	 */
	function __construct($file) {
		$this->file = fopen($file, "r");
	}
    
    /**
     * getHeaders: Retorna las cabeceras del archivo cargado en un arreglo de textos.
	 * 
     * @return array
     */
    public function getHeaders(){
		$headers = [];
		while(!feof($this->file)){
			$this->line = utf8_encode(fgets($this->file));
			break;
		}

		$arrayHeaders = explode($this->delimiter,$this->line);
		$arrayHeaders = Utils::arrayToLowecase($arrayHeaders);
		foreach ($arrayHeaders as $value) {
			array_push($headers,Utils::cleanAccent($value));
		}
		return $headers;
    }

		
	/**
	 * getData: Obtiene los datos del arichivo de texto y los retorna arreglo bidimensional, la llave es el nombre de la cabecera del archivo
	 *
	 * @param  mixed array $headers: Cabeceras del archivo de texto.
	 * @return array
	 */
	public function getData($headers){
		try{
			$data = [];
			$rows = [];
			while(!feof($this->file)){
				$this->line = fgets($this->file);
				if($this->line != ""){
					$empty = 1;
					$values = explode($this->delimiter,$this->line);
					$i = 0;
					foreach ($headers as $header) {
						if($header == ""){
							$rows["empty".$empty] =  trim($values[$i]);
							$empty++;
						}else{
							if(array_key_exists($header, $rows)){
								$total = Utils::countHeaderRepeat($rows,$header);
								$rows[$header.$total] =  trim($values[$i]);
							}else{
								$rows[$header] =  trim($values[$i]);
							}
						}
						$i++;
					}
					array_push($data,$rows);
					$rows = [];
				}
			}			
			return $data;
		}catch(\Exception $ex){
			$log = new Log("error");
			$log->writeLog("error: ".$ex);
		}
	}
	
	
	/**
	 * setDelimiter: Se almacena el caracter que es el delimitador de cada columna del archivo de texto
	 *
	 * @param  mixed String $delimiter: Caracter delimitador
	 * @return void
	 */
	public function setDelimiter($delimiter){
		$this->delimiter = $delimiter;
	}




    
}