<?php

namespace Feature;

class Player {
    private string $name;
    private int $score = 0;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function wonPoint(): void
    {
        $this->setScore($this->score + 1);
    }

    public function getScoreText(): string
    {
        if ($this->score === 1) {
            return "Fifteen";
        } elseif ($this->score === 2) {
            return "Thirty";
        } elseif ($this->score === 3) {
            return "Forty";
        }

        return "Love";
    }
}