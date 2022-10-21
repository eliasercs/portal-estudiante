<?php


namespace App\Strategies\Operations;


class Notas implements IStrategy
{

    public function process()
    {
        return ("<a href='/home ' target='_blank'  >Notas</a>");
    }
}
