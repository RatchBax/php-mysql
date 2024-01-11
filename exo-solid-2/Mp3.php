<?php
class Mp3 extends MusicReader {
    public function listen() {
        return 'Lecture du fichier Mp3 '. $this->file;
    }
}