<?php

namespace App\Http\Core\Aplication;
use App\Http\Core\Aplication\Log;


/**
 * ErrorsLogImpl: Clase para escribir errores de la aplicacion
 */
class ErrorsLogImpl implements Log{
    
    private $path;
    private $fileName;
    private $header;
    private $footer;
    
    /**
     * __construct: Se inicializan las variables de la ruta, nombre y cabecera del archivo, si no existe archivo lo crea
     *
     * @param  mixed String $folder: Carpeta donde va almacenar el log
     * @param  mixed String $header: Cabecera del archivo
     * @return void
     */
    public function __construct($folder)
    {
        $this->path = public_path()."\\logs\\errors\\".$folder."\\";
        if(!is_dir($this->path)){
            mkdir($this->path, 0777);
        }
        $this->fileName = "errorsLog_".date('Y-m-d').".txt";
        $this->header = "time: ".date('h:i:s')."\r\n";
        $this->footer = "\r\n*********************************************************************";
        
    }

      
    /**
     * writeLog: Escribe el error en el archivo log
     *
     * @param  mixed String $text: Texto a escribir
     * @return void
     */
    public function writeLog($text){
        if(file_exists($this->path.$this->fileName)){
            $file = fopen($this->path.$this->fileName, "a+");
            fwrite($file,"\r\n".$this->header.$text.$this->footer);
            fclose($file);
        }else{
            $file = fopen($this->path.$this->fileName, "a");
            fwrite($file,$this->header.$text.$this->footer);
            fclose($file);
        }
    }
}