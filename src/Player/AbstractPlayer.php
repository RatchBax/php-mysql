<?php 

namespace App\MatchMaker\Player {
use App\MatchMaker\Interfaces\PlayerInterface;
    abstract class AbstractPlayer implements PlayerInterface {
        public function __construct(public string $name = 'anonymous', public float $ratio = 400.0) {}
        abstract public function getName(): string;
        abstract public function getRatio(): float;
        abstract public function probabilityAgainst(PlayerInterface $player): float;
        abstract public function updateRatioAgainst(PlayerInterface $player, int $result): void;
    }

}