<?php

namespace Feature;

interface TennisGame
{
    /**
     * @param string $playerName
     * @return void
     */
    public function wonPoint(string $playerName): void;

    /**
     * @return string
     */
    public function getScore(): string;
}
