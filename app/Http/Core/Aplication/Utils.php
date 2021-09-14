<?php

namespace App\Http\Core\Aplication;

use Nette\IOException;

/**
 * Utils: Clase de herramientas utiles
 */
class Utils{
    
    /**
     * lettersToLowecase: Transforma una cadena de texto en minusculas
     *
     * @param  mixed String $value: texto a transformar
     * @return String
     */
    static function lettersToLowecase($value){

        $lower = strtolower($value);
        $find = array('Ñ','Á','É','Í','Ó','Ú');
       	$repl = array('ñ','á','é','í','ó','ú');
       	$response = str_replace($find, $repl, $lower);

        return trim($response);
    }
    
    /**
     * arrayToLowecase: Trasforma un arreglo de textos a minusculas
     *
     * @param  mixed Array $array: Arreglo a trasformar
     * @return Array
     */
    static public function arrayToLowecase($array){
        $arrayLoweCase = [];
        foreach ($array as $value) {
			if($value != ""){
				$string = self::lettersToLowecase($value);
            	array_push($arrayLoweCase,$string);
			}else{
				array_push($arrayLoweCase,$value);
			}
         	
		}
		return $arrayLoweCase;
	}
    
    /**
     * lettersToUpper: Trasforma una cadena de texto a mayusculas
     *
     * @param  mixed String $value: Texto a transformar
     * @return String
     */
    static function lettersToUpper($value){

        $upper = strtoupper($value);
       	$find = array('ñ','á','é','í','ó','ú');
        $repl = array('Ñ','Á','É','Í','Ó','Ú');
       	$response = str_replace($find, $repl, $upper);

        return trim($response);
    }
    
    /**
     * cleanAccent: Elimina los acentos de una cadena de texto
     *
     * @param  mixed String $value: Texto a limpiar acentos
     * @return String
     */
    static function cleanAccent($value){

       	$find = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú');
        $repl = array('a','e','i','o','u','A','E','I','O','U');
       	$response = str_replace($find, $repl, $value);

        return trim($response);
    }
	
	/**
	 * arrayCleanAccent: Elimina acentos de una arreglo de texto
	 *
	 * @param  mixed Array $array: Arreglo a limpiar acentos
	 * @return Array
	 */
	static public function arrayCleanAccent($array){
        $arrayCleanAccent = [];
        foreach ($array as $value) {
			if($value != ""){
				$string = self::cleanAccent($value);
            	array_push($arrayCleanAccent,$string);
			}else{
            	array_push($arrayCleanAccent,$value);
			}
         	
		}
		return $arrayCleanAccent;
	}
    
    /**
     * onlyTextAndNumber: Limpia texto de carracteres especiales, solo acepta letras, numeros y espacios
     *
     * @param  mixed String $value
     * @return String
     */
    static function onlyTextAndNumber($value){

        $patternCharSpecial = "([^A-Za-z0-9 ])";
        $repl = preg_replace($patternCharSpecial,'',$value);
        
        return trim($repl);
    }
    
    /**
     * countHeaderRepeat: Cuenta las llaves repetidas en un arreglo
     *
     * @param  mixed Array $array: Arreglo a evaluar
     * @param  mixed String $string: Texto a buscar si existe en arreglo
     * @return Integer
     */
    static function countHeaderRepeat($array,$string){
		$keys = array_keys($array);
		$total = 0;
		foreach ($keys as $value) {
			$pos = strpos($value, $string);
			if($pos !== false){
				$total++;
			}
		}
		return $total;
	}
    
    /**
     * compareHeaders: Compara dos arreglos si son iguales, al encontrar una llave que no existe en el arreglo principal retorna la llave no encontrada
     *
     * @param  mixed Array $main: Arreglo principal a evaluar
     * @param  mixed Array $secondary: Arreglo que se compara con el principal
     * @return Array
     */
    static function compareHeaders($main, $secondary){
		$return = true;
		$header = "";
        $position = 0;

    	$totalMain = sizeof($main);
		$totalSecondary = sizeof($secondary);

		
		for ($i=0; $i < $totalMain; $i++) { 
			$total = 0;
			for ($j=0; $j < $totalSecondary; $j++) { 
				if($main[$i] == $secondary[$j]){
					$total++;
					break;
				}
			}

			if($total == 0){
				$return = false;
				$header = $main[$i];
                $position = $i+1;
				break;
			}

		}

		return array("status"=>$return,"header"=>$header,"position"=>$position);
	}

}