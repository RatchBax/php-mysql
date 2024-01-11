<?php

// Si on doit supporter un nouveau type de format, on doit modifier cette classe :(
//require_once 'Mp3.php';
//require_once 'Ogg.php';

abstract class MusicReader {
    protected $file;

    public function __construct($file) {
        $this->file = $file;
    }

    abstract public function listen() ;
}