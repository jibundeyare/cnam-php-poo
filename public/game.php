<?php
// public/game.php

use Cnam\Character;

require __DIR__.'/../vendor/autoload.php';

$c = new Character();
$c
    ->setName('Toto')
    ->setHp(random_int(10, 50))
    ->setMp(random_int(60, 100))
;

$c2 = new Character();
$c2
    ->setName('Titi')
    ->setHp(random_int(10, 50))
    ->setMp(random_int(60, 100))
;

echo $c->getName().' VS '.$c2->getName().'<br>';

// fight
$winner = null;

while (true) {
    $energy = $c->attack(random_int(5, 10));
    $c2->damage($energy);

    // echo $c2->getName().' hp : '.$c2->getHp().'<br>';
    echo "{$c2->getName()} hp : {$c2->getHp()}<br>";

    if ($c2->isDead()) {
        $winner = $c;
        break;
    }

    $energy = $c2->attack(random_int(5, 10));
    $c->damage($energy);

    echo $c->getName().' hp : '.$c->getHp().'<br>';

    if ($c->isDead()) {
        $winner = $c2;
        break;
    }
}

echo "And the winner is {$winner->getName()}<br>";
