<?php

abstract class MusicType {
    public $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }


    public abstract function listen($filename);
}