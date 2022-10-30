<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Ramo;
use App\Models\Reserva;
use App\Models\AsistenteSocial;
use App\Models\InscripcionHours;
use Auth;

class AsintenteSocial extends Controller
{
    //
    public function data() {
        //carga la informacion de los asistentes
        $asistentes =AsistenteSocial::all();
        #return $asistentes[0]->Horas();
        return view('auth.asistente-social',['asistentes' => $asistentes]);
        
    }

    public function dias(Request $request) {
        # Esta funcion se encarga de devolver una lista con todos los dias que atendera un determinado asistente
        if(isset($request->data)){
            $dias= Reserva::where('asistente','=',$request->data)->get();
            # dentro de un arreglo vacio ponemos todas las fechas en las que atendera, no se repiten
            $unicos=[];
            $i=0;
            foreach($dias as $d){
                if (!in_array($d->Fecha, $unicos)){
                    $unicos[$i]= $d->Fecha;
                    $i = $i+1;
                }
            }
            #devolvemos un json con la lista encontrada
            return response()->json([
                'lista' => $unicos,
                'success' => true
            ]);
        }else{
            return response()->json([
                'success' => false
            ]);
        }       
    }
    public function horas(Request $request) {
        #hace exactamente lo mismo que la funcion anterior con la diferencia de que ahora queremos saber las horas dependiendo del dia
        #ahora en el Json debera contener el asistente y la fecha
        if(isset($request->data)){
            $ocupados = [];
            $i = 0;
            foreach(InscripcionHours::all() as $j){
                $ocupados[$i] = $j->IDHora;
                $i = $i+1; 
            }
            $horas= Reserva::where('asistente','=',$request->asis)->where("fecha","=",$request->data)->whereNotIn('id', $ocupados)->get();
            return response()->json([
                'lista' => $horas,
                'success' => true
            ]);
        }else{
            return response()->json([
                'success' => false
            ]);
        }       
    }
    public function chunks() {
        //buscamos generar un arreglo de colecciones de 3 dimensiones, separados por el asistente, por el dia de la consulta y la hora
        //[asistente][dia][hora]
        //utilizado para pruebas
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
        return ['arr' => $sol,'org' => $horas];
        
    }
    public function gen() {
        //genera el horario de una semana a partir del siguiente lunes
        //implementado a travez de carbon

        $asistentes = AsistenteSocial::all();
        $monday = new Carbon('next monday');
        //a cada asistente le genera el horario de una semana
        foreach ($asistentes as $as) {
            for ($i = 0; $i < 5; $i++) {
                //jornada de 9 a 14, con 1 hora de duracion
                for ($j = 9; $j <= 18; $j++){
                    $monday->hour =$j;
                    $new = Reserva::create(['asistente'=> $as->id,
                            'fecha'=> $monday, 
                            'hora' => $monday,
                        ]);
                }
                $monday->addDay(1);}
            }
        //devuelve lo que genera
        return Reserva::all();
    }
    public function reservar(Request $request) {
        //solo puede ser accedido si el usuario esta logeado
        if(auth()->user()){
            //solo puede tener una hora inscrita, por lo que se borra la anterior
            if(auth()->user()->Horas){
                auth()->user()->Horas->delete();
            }
            //creamos la hora
            $hora = $request->hora;
            $id = auth()->user()->id;
    
            $new = InscripcionHours::create([
            'idusuario'=> $id,
            'idhora'=> $hora,
            ]);
            return "Hora inscrita";
        }
        return "Por favor inicia sesion";       
    }
    public function destroy(Request $request) {  
        return $request;
    }
}
