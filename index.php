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

spl_autoload_register(static function($fqcn) {
    $path= str_replace(['App\\MatchMaker', '\\'], ['src', '/'], $fqcn . '.php');
    require_once $path;
});

use App\MatchMaker\Player\Player;
use App\MatchMaker\Lobby\Lobby;

$greg = new Player('Greg');
$jade = new Player('Jade');
$lobby = new Lobby();

$lobby->addPlayers($greg, $jade);
var_dump($lobby->queuingPlayers);
echo "Finding opponents for Greg...";
var_dump($lobby->findOponents($lobby->queuingPlayers[0]));

exit(0);