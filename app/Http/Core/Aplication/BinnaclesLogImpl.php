<?php

namespace App\Http\Core\Aplication;
use App\Http\Core\Aplication\Log;


/**
 * BinnaclesLogImpl: Clase para crear bitacora de registros
 */
class BinnaclesLogImpl implements Log{
    
    private $path;
    private $fileName;
    private $header;
     
    /**
     * __construct: Se inicializan las variables de la ruta, nombre y cabecera del archivo, si no existe archivo lo crea
     *
     * @param  mixed String $folder: Carpeta donde va almacenar el log
     * @return void
     */
    public function __construct($folder)
    {
        $this->path = public_path()."\\logs\\binnacles\\".$folder."\\";
        if(!is_dir($this->path)){
            mkdir($this->path, 0777);
        }
        $this->fileName = "binnaclesLog_".date('Y-m-d').".txt";
    }

      
    /**
     * writeLog: Escribe una linea en el archivo log
     *
     * @param  mixed String $text: Texto a escribir
     * @return void
     */
    public function writeLog($text){
        if(file_exists($this->path.$this->fileName)){
            $file = fopen($this->path.$this->fileName, "a+");
            fwrite($file,"\r\n".$text);
            fclose($file);
        }else{
            $file = fopen($this->path.$this->fileName, "a");
            fwrite($file,$this->header."\r\n".$text);
            fclose($file);
        }
    }
    
    /**
     * setHeader: Almacena cabecera del archivo
     *
     * @param  mixed String $header: Texto de cabecera
     * @return void
     */
    public function setHeader($header){
        $this->header = $header;
    }
}