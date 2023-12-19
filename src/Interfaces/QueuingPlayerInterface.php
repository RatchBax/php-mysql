<?php
namespace App\MatchMaker\Interfaces {

    interface QueuingPlayerInterface {
        public function getRange(): int;
        public function upgradeRange() : void;

        public function getRatio() : float;
        public function getName() : string;
    }
}