<?php


namespace App\Strategies\Operations;


class B_curso implements IStrategy
{

    public function process()
    {
        return ("<a href='/course/delete' target='_blank'  >Borrar curso</a>");
    }
}
