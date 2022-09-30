<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'Hola') {
                $this->askName($botman);
            } else {
                $botman->reply("Escribe 'Hola' para probar...");
            }
        });

        $botman->listen();
    }

    public function nlp()
    {
    }

    /**
     * Place your BotMan logic here.
     */
    public  function  askName($botman)
    {
        $botman->ask('¡Hola! ¿Cuál es su nombre?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Encantada de conocerte ' . $name . '. ¿Que necesitas?');
        });
    }
}
