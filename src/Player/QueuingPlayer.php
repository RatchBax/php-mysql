<?php

namespace App\MatchMaker\Player {

    use App\MatchMaker\Interfaces\PlayerInterface;
    use App\MatchMaker\Interfaces\QueuingPlayerInterface;
    class QueuingPlayer extends Player implements QueuingPlayerInterface {
        public function __construct(PlayerInterface $player, protected int $range = 1)
        {
            parent::__construct($player->getName(), $player->getRatio());
        }

        public function getRange(): int
        {
            return $this->range;
        }

        public function upgradeRange(): void
        {
            $this->range = min($this->range + 1, 40);
        }

        public function getName() : string {
            return $this->getName();
        }

        public function getRatio() : float {
            return $this->ratio;
        }
    }
}