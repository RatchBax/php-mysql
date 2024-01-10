<?php

// Si on doit supporter un nouveau type de format, on doit modifier cette classe :(
//require_once 'Mp3.php';
//require_once 'Ogg.php';

class MusicReader {
    private MusicType $file;

    public function __construct(MusicType $file) {
        $this->file = $file;
    }

    public function listen() {
        $this->file->listen($this->file->filename);
    }
}