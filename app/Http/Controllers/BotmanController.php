<?php

namespace App\Http\Controllers;

use App\Conversations\Interactives;
use App\Conversations\Operations;
use App\Conversations\Quiz;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotmanController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman = resolve('botman');
        #$botman->reply("hola");

        /*$botman->hears("{message}", function ($botman, $message) {
            if ($message == NULL) {
                $this->askName($botman);
            } else {
                $botman->reply("Please write hi to start conversation! ");
            }
        });
        $botman->hears('Hi|Hola', function ($bot) {
            $bot->reply($bot->getUser()->getId());
            $bot->reply('Hola como estas!');
        });*/
        #$botman->hears('conversar', BotmanController::class . '@startConversation');
        $botman->hears('Si|si|yes|Yes|s|S', BotmanController::class . '@startOperations');
        #$botman->hears('interactivo', BotmanController::class . '@startInteractive');
        #$botman->hears('examen', BotmanController::class . '@startQuiz');
        #$botman->hears('secciones', BotmanController::class . '@startOperations');

        $botman->hears('stop', function (\BotMan\BotMan\BotMan $botMan) {
            $botMan->reply('chat detenido');
        })->stopsConversation();

        $botman->fallback(function (\BotMan\BotMan\BotMan $bot) {
            $bot->reply('Para interactuar ingresa lo siguiente:');
            $bot->reply('hola');
            $bot->reply('matematicas');
            $bot->reply('interactivo');
            $bot->reply('conversar');
            $bot->reply('secciones');
        });
        $botman->listen();
    }


    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startOperations(BotMan $bot)
    {
        $bot->startConversation(new Operations());
    }
    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startInteractive(BotMan $bot)
    {
        $bot->startConversation(new Interactives());
    }
    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startQuiz(BotMan $bot)
    {
        $bot->startConversation(new Quiz());
    }
}
