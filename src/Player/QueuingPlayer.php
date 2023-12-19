<?php

namespace App\MatchMaker\Player {

    use App\MatchMaker\Interfaces\PlayerInterface;
    use App\MatchMaker\Interfaces\QueuingPlayerInterface;
    class QueuingPlayer implements QueuingPlayerInterface {
        private PlayerInterface $player;
        public function __construct(PlayerInterface $player, protected int $range = 1)
        {
            $this->player = $player;
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
            return $this->player->getName();
        }

        public function getRatio() : float {
            return $this->player->getRatio();
        }
    }
}