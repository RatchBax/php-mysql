<?php 

namespace App\MatchMaker\Player{

    use App\MatchMaker\Interfaces\PlayerInterface;

    class BlitzPlayer extends Player {
        public function __construct(public string $name = 'anonymous', public float $ratio = 1200.0)
        {
            parent::__construct($name, $ratio);
        }
    
        public function updateRatioAgainst(PlayerInterface $player, int $result): void
        {
            $this->ratio += 128 * ($result - $this->probabilityAgainst($player));
        }
    }
}