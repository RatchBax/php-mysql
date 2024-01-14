<?php 

interface ActionnableEventInterface extends EventInterface {
    /**
     * If the event is actionnable, returns the list of available actions
     *
     * @return array
     */
    public function action() : array;
}