<?php

class Log {
    private $file_name;
    private $fp;
    
    public function __construct($file_name) {
        $this->file_name = $file_name;
      
    }
    
    public function getFilePointer(){
        return $this->fp;
    }
    
    public function write($message, $type="Info") {
       
        if(!is_resource($this->fp)) {
            $this->open();
        } else {
            $sep = "::";
            $msg_type = "[Type: " . $type . "]";
            $msg = "[Message: " . $message . "]";
            $location = "[Location: " . $_SERVER['PHP_SELF'] ."]";
            $time = @date('[d/m/Y:H:i:s]');
			
            
            $text = $msg_type . $sep . $msg . $sep . $location . $sep . $time . PHP_EOL;
            
            fwrite($this->fp, $text);
          
        }
    }
    
    public function open() {
        $this->fp = fopen($this->file_name, 'a') or die("Impossible d'ouvrir le fichier");
       
        return $this->fp;
    }
    
    public function close() {
        fclose($this->fp);
      
    }
    
   
}


$logFile = new Log('controllers/logs/logs.txt');

?>