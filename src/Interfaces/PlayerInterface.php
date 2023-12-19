<?php
namespace App\MatchMaker\Interfaces {
    interface PlayerInterface {
        public function getName() : string;
        public function probabilityAgainst(PlayerInterface $player): float;
        public function updateRatioAgainst(PlayerInterface $player, int $result): void;
        public function getRatio() : float;
    }
}