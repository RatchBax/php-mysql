<?php

namespace App\MatchMaker\Lobby {

    use App\MatchMaker\Interfaces\LobbyInterface;
    use App\MatchMaker\Interfaces\PlayerInterface;
    use App\MatchMaker\Interfaces\QueuingPlayerInterface;
    use App\MatchMaker\Player\QueuingPlayer;

    class Lobby implements LobbyInterface {
        /** @var array<QueuingPlayer> */
        public array $queuingPlayers = [];

        public function findOponents(QueuingPlayerInterface $player): array
        {
            $minLevel = round($player->getRatio() / 100);
            $maxLevel = $minLevel + $player->getRange();

            return array_filter($this->queuingPlayers, static function (QueuingPlayer $potentialOponent) use ($minLevel, $maxLevel, $player) {
                $playerLevel = round($potentialOponent->getRatio() / 100);

                return $player !== $potentialOponent && ($minLevel <= $playerLevel) && ($playerLevel <= $maxLevel);
            });
        }

        public function addPlayer(PlayerInterface $player): void
        {
            $this->queuingPlayers[] = new QueuingPlayer($player);
        }

        public function addPlayers(PlayerInterface ...$players): void
        {
            foreach ($players as $player) {
                $this->addPlayer($player);
            }
        }
    }
}