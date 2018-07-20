<?php

class File
{
    const TAB = "\t";
    const TAB2 = "\t\t";
    const ENTER = "\n";
    const ENTER2 = "\n\n";
    
    private $pathWithFileName;
    private $fileStream;
    
    public function __construct($pathWithFileName) 
    {        
        $this->pathWithFileName = $pathWithFileName;
    }

    public function create()
    {
        $this->fileStream = fopen($this->pathWithFileName, 'w');
        if($this->fileStream == false){
            throw new Exception('Does not possible create the file: ' . $this->pathWithFileName);
        }
    }    

    public function write($content)
    {
        if(!file_exists($this->pathWithFileName)){
            throw new Exception('Does not possible find the file: ' . $this->pathWithFileName);
        }
        
        if(!is_writeable($this->pathWithFileName)){
            throw new Exception('The file is not writable: ' . $this->pathWithFileName);
        }
        
        $this->fileStream = fopen($this->pathWithFileName, 'a');
        if($this->fileStream == false){
            throw new Exception('Does not possible open the file: ' . $this->pathWithFileName);
        }
        
        fwrite($this->fileStream, $content);
        fclose($this->fileStream);
    }  
    
    public function readAsString()
    {
        if(!file_exists($this->pathWithFileName)){
            throw new Exception('Does not possible find the file: ' . $this->pathWithFileName);
        }
        
        if(!is_readable($this->pathWithFileName)){
            throw new Exception('File is not readable: ' . $this->pathWithFileName);
        }
        
        return implode(null, file($this->pathWithFileName));
    }
    
    public function read()
    {
        if(!file_exists($this->pathWithFileName)){
            throw new Exception('Does not possible find the file: ' . $this->pathWithFileName);
        }
        
        if(!is_readable($this->pathWithFileName)){
            throw new Exception('File is not readable: ' . $this->pathWithFileName);
        }        
        
        return file($this->pathWithFileName);
    }    
    
    public function delete()
    {
        if(!file_exists($this->pathWithFileName)){
            throw new Exception('Does not possible find the file: ' . $this->pathWithFileName);
        }
        
        if(!unlink($this->pathWithFileName)){
            throw new Exception('Does not possible exclude the file: ' . $this->pathWithFileName);
        }
    }
    
    public function import()
    {
        return include($this->pathWithFileName);
    }
}