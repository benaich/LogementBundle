<?php

namespace Ben\LogementBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


class Import
{
    private $path;
    /**
    * @var file $file
    * @Assert\File()
    */
    private $file;
    
     /************ Le constructeur ************/
    
    public function __construct()
    {
        $this->path = 'sqlite.db';
    }
    
    /************ Les setters et getters ************/
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploads/sqlite';
    }
  
    public function upload()
    {
        if (null === $this->file) return false;

        $this->file->move($this->getUploadRootDir(), $this->path);
        unset($this->file);
        return true;
    }

    public function removeUpload()
    {
        if ($this->getAbsolutePath()) {
            unlink($this->getAbsolutePath());
        }
    }
}