<?php
/**
 * Class file management
 * 
 * @author Tayron Miranda <contato@tayron.com.br>
 */
class File
{
    const TAB = "\t";
    const TAB2 = "\t\t";
    const ENTER = "\n";
    const ENTER2 = "\n\n";
    
    /**
     * Store file name with your path
     * @var string
     */
    private $pathWithFileName;
    
    /**
     * Store file streaming
     * @var string
     */    
    private $fileStream;
    
    /**
     * @param string $pathWithFileName File name with your path
     */
    public function __construct($pathWithFileName) 
    {        
        $this->pathWithFileName = $pathWithFileName;
    }

    /**
     * Create file case him not exist
     * @throws Exception
     */
    public function create()
    {
        $this->fileStream = fopen($this->pathWithFileName, 'w');
        if($this->fileStream == false){
            throw new Exception('Does not possible create the file: ' . $this->pathWithFileName);
        }
    }    

    /**
     * Store text in the file
     * @throws Exception
     */    
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
    
    /**
     * Reads and returns the file content as string
     * @return string Content file
     * @throws Exception
     */
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
    
    /**
     * Reads and returns the file content as array
     * @return array List with file content
     * @throws Exception
     */
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
    
    /**
     * Delete file from server
     * @throws Exception
     */
    public function delete()
    {
        if(!file_exists($this->pathWithFileName)){
            throw new Exception('Does not possible find the file: ' . $this->pathWithFileName);
        }
        
        if(!unlink($this->pathWithFileName)){
            throw new Exception('Does not possible exclude the file: ' . $this->pathWithFileName);
        }
    }
    
    /**
     * Import file like php "include" function 
     * @see http://php.net/manual/pt_BR/function.include.php
     * @return mixed File content
     */
    public function import()
    {
        return include($this->pathWithFileName);
    }
}