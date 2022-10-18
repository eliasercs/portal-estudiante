<?php


namespace App\Strategies\Operations;


class Documentos implements IStrategy
{

    public function process()
    {
        return ("<a href='/imprimir ' target='_blank'  >Curso inscrito</a>");
    }
}
