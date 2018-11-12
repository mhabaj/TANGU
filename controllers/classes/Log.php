<?php

class Log {
    private $file_name;
    private $fp;
    
    public function __construct($file_name) {
        $this->file_name = $file_name;
        //echo "<p>Objet Log instancié</p>";
    }
    
    public function getFilePointer(){
        return $this->fp;
    }
    
    public function write($message, $type="Info") {
        //Ecrire dans le fichier
        //Si le pointeur n'existe pas, creer un nouveau fichier
        //Sinon ecrire le message avec date et localisation du fichier
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
            echo "<p>Message ecrit</p>";
        }
    }
    
    public function open() {
        $this->fp = fopen($this->file_name, 'a') or die("Impossible d'ouvrir le fichier");
        echo "<p>Fichier ouvert</p>";
        return $this->fp;
    }
    
    public function close() {
        fclose($this->fp);
        //echo "Fichier fermé";
    }
    
    public function __destruct() {
        //echo "Destruction de l'objet";
    }
}

$logfile = new Log('../logs/logs.txt');

//$myfile = new Log('../logs/logs.txt');
//$myfile->open();
//$myfile->write('Erreur log', 'Erreur');
//$myfile->close();



?>