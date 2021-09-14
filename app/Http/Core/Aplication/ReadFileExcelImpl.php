<?php

namespace App\Http\Core\Aplication;
use App\Http\Core\Aplication\ReadFile;
use App\Http\Core\Aplication\Utils;
use Excel;


/**
 * ReadFileExcelImpl: Clase para leer archivo de tipo excel
 */
class ReadFileExcelImpl implements ReadFile{

	private $collection;

	
	/**
	 * __construct: Se carga el archivo excel para leerlo
	 *
	 * @param  mixed File $file: Archivo Excel
	 * @return void
	 */
	function __construct($file) {
		$data = Excel::toArray(new ExcelImport, $file);
		$this->collection = $data[0];
	}
    
    /**
     * getHeaders: Obtiene el encabezado del archivo excel en un arreglo de textos
     *
     * @return array
     */
    public function getHeaders(){
        $dataLowecase = Utils::arrayToLowecase($this->collection[0]);
		$headers = Utils::arrayCleanAccent($dataLowecase);
		unset($this->collection[0]);
		return $headers;
    }
	
	/**
	 * getData: Obtiene los datos del archivo tipo excel, las llaves del arreglo son la cabecera del excel
	 *
	 * @param  mixed $headers
	 * @return void
	 */
	public function getData($headers){
		$data = [];
		$rows = [];
		foreach($this->collection as $row){
			$i = 0;
			$empty = 1;
			foreach($headers as $header){
				if($header == ""){
					$rows["empty".$empty] =  trim($row[$i]);
					$empty++;
				}else{
					if(array_key_exists($header, $rows)){
						$total = Utils::countHeaderRepeat($rows,$header);
						$rows[$header.$total] =  trim($row[$i]);
					}else{
						$rows[$header] =  trim($row[$i]);
					}
				}
				$i++;
			}
			array_push($data,$rows);
			$rows = [];
		}
		return $data;
	}
    
}