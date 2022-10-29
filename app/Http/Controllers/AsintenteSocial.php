<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Ramo;
use App\Models\Reserva;
use App\Models\AsistenteSocial;
use Auth;

class AsintenteSocial extends Controller
{
    //
    public function data() {
        //buscamos generar un arreglo de colecciones de 3 dimensiones, separados por el asistente, por el dia de la consulta y la hora
        //[asistente][dia][hora]
        $horas = Reserva::all();
        
        $chunks = $horas->chunkWhile(function ($value, $key, $chunk) {
            return $value->Asistente === $chunk->last()->Asistente;
        });
        $c = $chunks->map->values()->all();
        $sol = [[]];
        $i=0;

        foreach ($c as $c) {
            $temp = $c->chunkWhile(function ($value, $key, $chunk) {
                return date("d", strtotime($value->Horario)) === date("d", strtotime($chunk->last()->Horario));
            });
            $sol[$i] = $temp->map->values()->all();
            $i= $i +1;
        }
        foreach ($horas as $h){
            $xd = $h->Asistente;
            #return AsistenteSocial::find($xd)->Nombre;
            #return $h->Ast;
        }
        return view('auth.asistente-social',['arr' => $sol,'org' => $horas]);
        
    }
    public function gen() {
        //genera el horario de una semana a partir del siguiente lunes

        $asistentes = AsistenteSocial::all();
        $monday = new Carbon('next monday');
        foreach ($asistentes as $as) {
            for ($i = 0; $i < 5; $i++) {
                for ($j = 9; $j <= 18; $j++){
                    $monday->hour =$j;
                    $new = Reserva::create(['asistente'=> $as->id,
                            'horario'=> $monday, 
                        ]);
                }
                $monday->addDay(1);}
            }
        return Reserva::all();
    }
    
}
