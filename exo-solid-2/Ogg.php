<?php
class Ogg extends MusicType {
    public function listen($filename) {
        return 'Lecture du fichier Ogg '. $filename;
    }
}