<?php


namespace App\Strategies\Operations;


class C_inscritos implements IStrategy
{

    public function process()
    {
        return ("<a href='/tramos ' target='_blank'  >Cursos inscritos</a>");
    }
}
