<?php

namespace App\TicTacToe\Model;

class Point
{
    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    public function __construct(int $x, int $y)
    {
        $this->assertCoordinates($x, $y);

        $this->x = $x;
        $this->y = $y;
    }

    public static function fromArray(array $coordinate)
    {
        return new static($coordinate[0], $coordinate[1]);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    protected function assertCoordinates($x, $y)
    {
        foreach ([$x, $y] as $coordinate) {
            if ($coordinate < 0 || $coordinate > 2) {
                throw new \InvalidArgumentException('Invalid coordinate');
            }
        }
    }
}
