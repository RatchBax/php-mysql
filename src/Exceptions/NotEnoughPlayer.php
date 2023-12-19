<?php
namespace App\Domain\Exceptions {
    use RuntimeException;
    class NotEnoughPlayer extends RuntimeException {
        public $message = "Plus de joueurs sont nécessaire pour commencer la partie";
    }
}
