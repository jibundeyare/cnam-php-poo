<?php
// src/Cnam/Character.php

namespace Cnam;

class Character
{
    private $name;
    private $hp;
    private $mp;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    public function getMp()
    {
        return $this->mp;
    }

    public function setMp($mp)
    {
        $this->mp = $mp;

        return $this;
    }

    public function isDead()
    {
        if ($this->hp <= 0) {
            // is dead
            return true;
        }

        // is not dead
        return false;
    }

    public function attack($energy)
    {
        if ($this->mp >= $energy) {
            // we have enough mp
            $this->mp = $this->mp - $energy;

            return $energy;
        }

        // we don't have enough mp 
        return 0;
    }

    public function damage($energy)
    {
        if ($this->hp <= $energy) {
            $this->hp = 0;

            return $this;
        }

        $this->hp = $this->hp - $energy;

        return $this;
    }
}
