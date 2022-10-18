<?php


namespace App\Strategies\Operations;


class Inscripcion implements IStrategy
{

    public function process()
    {
        return ("<a href='/inscripcion ' target='_blank'  >Inscribir curso</a>");
    }
}
