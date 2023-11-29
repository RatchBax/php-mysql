<?php

/*
 * This file is part of the OpenClassRoom PHP Object Course.
 *
 * (c) Grégoire Hébert <contact@gheb.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

abstract class AbstractPlayer {
    protected string $name;
    protected float $ratio;

    public function getName(): string
    {
        return $this->name;
    }

    public function getRatio(): float
    {
        return $this->ratio;
    }
}   

class Lobby
{
    /** @var array<QueuingPlayer> */
    public array $queuingPlayers = [];

    public function findOponents(QueuingPlayer $player): array
    {
        $minLevel = round($player->getRatio() / 100);
        $maxLevel = $minLevel + $player->getRange();

        return array_filter($this->queuingPlayers, static function (QueuingPlayer $potentialOponent) use ($minLevel, $maxLevel, $player) {
            $playerLevel = round($potentialOponent->getRatio() / 100);

            return $player !== $potentialOponent && ($minLevel <= $playerLevel) && ($playerLevel <= $maxLevel);
        });
    }

    public function addPlayer(Player $player): void
    {
        $this->queuingPlayers[] = new QueuingPlayer($player);
    }

    public function addPlayers(Player ...$players): void
    {
        foreach ($players as $player) {
            $this->addPlayer($player);
        }
    }
}

class Player extends AbstractPlayer
{
    public function __construct(protected string $name, protected float $ratio = 400.0) { }

    private function probabilityAgainst(self $player): float
    {
        return 1 / (1 + (10 ** (($player->getRatio() - $this->getRatio()) / 400)));
    }

    protected function updateRatioAgainst(self $player, int $result): void
    {
        $this->ratio += 32 * ($result - $this->probabilityAgainst($player));
    }
}



class QueuingPlayer extends Player {
    protected int $range;

    public function __construct(Player $player)
    {
        parent::__construct($player->name, $player->ratio);
        $this->range = 1;
        var_dump($this);
    }

    public function getRange() {
        return $this->range;
    }
}

class BlitzPlayer extends Player {
    public function  __construct($name) 
    {
        parent::__construct($name, 1200);
    }

    public function updateRatioAgainst(Player $player, int $result) : void {
        parent::updateRatioAgainst($player, $result * 4);
    }
}

$greg = new BlitzPlayer('greg');
$jade = new BlitzPlayer('jade');
$Jean = new BlitzPlayer('Jean');
$Michel = new BlitzPlayer('Michel');

$lobby = new Lobby();

$lobby->addPlayers($greg, $jade, $Jean, $Michel);

$Jean->updateRatioAgainst($Michel, 5);

var_dump($lobby->findOponents($lobby->queuingPlayers[0]));
var_dump($Jean);
exit(0);