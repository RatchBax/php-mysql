<?php

namespace App\MatchMaker\Player {

    use App\MatchMaker\Interfaces\PlayerInterface;

    class Player extends AbstractPlayer implements PlayerInterface
    {
        public function getName(): string
        {
            return $this->name;
        }

        public function probabilityAgainst(PlayerInterface $player): float
        {
            return 1 / (1 + (10 ** (($player->getRatio() - $this->getRatio()) / 400)));
        }

        public function updateRatioAgainst(PlayerInterface $player, int $result): void
        {
            $this->ratio += 32 * ($result - $this->probabilityAgainst($player));
        }

        public function getRatio(): float
        {
            return $this->ratio;
        }
    }

}