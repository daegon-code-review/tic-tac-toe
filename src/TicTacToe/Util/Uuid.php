<?php

namespace App\TicTacToe\Util;

class Uuid
{
    public static function generate()
    {
        return uniqid();
    }
}
