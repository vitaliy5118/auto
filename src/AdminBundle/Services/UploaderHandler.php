<?php

namespace AdminBundle\Services;

/**
 * Description of FileLoader
 *
 * @author Виталий
 */
class UploaderHandler {
   
    protected $file;
    
    public function __construct($file) {
        $this->file = $file;
    }
    
    public function loadFile()
    {
      return $this->file;   
    }
    
    public function deleteFile()
    {
      return $this->file;  
    }
}
