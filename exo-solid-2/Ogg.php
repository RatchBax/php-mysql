<?php
class Ogg extends MusicReader {
    public function listen() {
        return 'Lecture du fichier Ogg '. $this->file;
    }
}