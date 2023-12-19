<?php

namespace App\Domain\Exceptions {
    use RuntimeException;
    class NotInLobby extends RuntimeException {
        public $message = "Ce joueur n'est pas dans le lobby";
    }
}