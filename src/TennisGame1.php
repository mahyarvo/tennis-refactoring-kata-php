<?php

namespace Feature;

class TennisGame1 implements TennisGame
{
    private Player $player1;
    private Player $player2;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1 = new Player($player1Name);
        $this->player2 = new Player($player2Name);
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === $this->getPlayer1Name()) {
            $this->player1->wonPoint();
        } else {
            $this->player2->wonPoint();
        }
    }
    public function getScore(): string
    {
        if ($this->hasEqualScore()) {
            return $this->getEqualScoreText();
        }

        if ($this->hasWinner()) {
            return $this->getWinnerText();
        }

        return $this->getGameScoreText();
    }

    private function hasWinner(): bool
    {
        $player1Score = $this->getPlayer1Score();
        $player2Score = $this->getPlayer2Score();
        return $player1Score >= 4 || $player2Score >= 4;
    }
    private function getWinnerText(): string
    {
        $player1Name = $this->getPlayer1Name();
        $player2Name = $this->getPlayer2Name();
        $player1Score = $this->getPlayer1Score();
        $player2Score = $this->getPlayer2Score();
        $minusResult = $player1Score - $player2Score;

        if ($minusResult == 1) {
            $score = "Advantage {$player1Name}";
        } elseif ($minusResult == -1) {
            $score = "Advantage {$player2Name}";
        } elseif ($minusResult >= 2) {
            $score = "Win for {$player1Name}";
        } else {
            $score = "Win for {$player2Name}";
        }

        return $score;
    }
    private function hasEqualScore(): bool
    {
        $player1Score = $this->getPlayer1Score();
        $player2Score = $this->getPlayer2Score();
        return $player1Score === $player2Score;
    }
    private function getEqualScoreText(): string
    {
        $score = $this->player1->getScore();
        $scoreText = $this->player1->getScoreText();

        if ($score < 3) {
            $scoreText .= "-All";
        } else {
            $scoreText = "Deuce";
        }

        return $scoreText;
    }
    private function getGameScoreText(): string
    {
        $player1ScoreText = $this->player1->getScoreText();
        $player2ScoreText = $this->player2->getScoreText();
        return "{$player1ScoreText}-{$player2ScoreText}";
    }

    public function getPlayer1Name(): string
    {
        return $this->player1->getName();
    }
    public function getPlayer2Name(): string
    {
        return $this->player2->getName();
    }
    private function getPlayer1Score(): int
    {
        return $this->player1->getScore();
    }
    private function getPlayer2Score(): int{
        return $this->player2->getScore();
    }
}
