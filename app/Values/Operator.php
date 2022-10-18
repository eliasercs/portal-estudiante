<?php


namespace App\Values;


use App\Strategies\Operations\Notas;
use App\Strategies\Operations\Inscripcion;
use App\Strategies\Operations\Documentos;
use App\Strategies\Operations\NotFound;
use App\Strategies\Operations\C_inscritos;
use App\Strategies\Operations\B_curso;


final class Operator
{
    const GET_STRATEGY = [
        'N' => Notas::class,
        'C' => C_inscritos::class,
        'D' => Documentos::class,
        'I' => Inscripcion::class,
        'B' => B_curso::class
    ];

    static function getStrategy($value)
    {
        if (key_exists($value, self::GET_STRATEGY)) {
            return self::GET_STRATEGY[$value];
        }
        return NotFound::class;
    }
}
