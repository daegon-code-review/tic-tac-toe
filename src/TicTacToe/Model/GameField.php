<?php

namespace App\TicTacToe\Model;

class GameField
{
    /**
     * @var array
     */
    protected $field;

    public function __construct()
    {
        $this->field = array_fill(0, 3, array_fill(0, 3, null));
    }

    public function putMark(Point $coordinate, $mark)
    {
        $this->field[$coordinate->getY()][$coordinate->getX()] = $mark;
    }

    public function getMark(Point $coordinate): ?int
    {
        return $this->field[$coordinate->getY()][$coordinate->getX()];
    }

    public function getWinnerMark(): ?int
    {
        foreach ([0, 1] as $mark) {
            if ($this->checkWinnerByMark($mark)) {
                return $mark;
            }
        }

        return null;
    }

    private function checkWinnerByMark($mark)
    {
        $winRow = array_fill(0, 3, $mark);

        for ($i = 0; $i < 3; $i++) {
            if ($this->field[$i] === $winRow) {
                return true;
            }
        }

        for ($i = 0; $i < 3; $i++) {
            if ([$this->field[0][$i], $this->field[1][$i], $this->field[2][$i]] === $winRow) {
                return true;
            }
        }

        return [$this->field[0][0], $this->field[1][1], $this->field[2][2]] === $winRow ||
            [$this->field[2][0], $this->field[1][1], $this->field[0][2]] === $winRow;
    }
}
