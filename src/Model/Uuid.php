<?php

namespace TicTacToe\Model;

class Uuid
{
    /**
     * @var string
     */
    protected $id;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId()
    {
        return $this->id;
    }
}
