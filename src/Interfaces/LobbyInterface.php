<?php
namespace App\MatchMaker\Interfaces {
    use App\MatchMaker\Player\QueuingPlayer;


    interface LobbyInterface {
        public function findOponents(QueuingPlayer $player): array;
        public function addPlayer(PlayerInterface $player): void;
        public function addPlayers(PlayerInterface ...$player): void;
    }
}