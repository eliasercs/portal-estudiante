<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
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

            if ($message == "Si" || $message == "si") {
                $this->askName($botman);
            }
            $botman->reply("¿quiere ver secciones adicioales?");
            if ($message == "Si" || $message == "si") {
                $this->opcionesAdicionales($botman);
            }
        });

        $botman->listen();
    }

    public function opcionesAdicionales($botman)
    {
        $botman = resolve('botman');

        $question = Question::create('')
            ->callbackId('agree')
            ->addButtons([
                button::create('certificado academico')->value('has pinchado las cer aca'),
                button::create('informacion personal')->value('has pinchado la info personal'),
                button::create('observacion a la ficha')->value('has pinchado  obs a la ficha'),
                button::create('cuenta corriente')->value('has pinchado los c corriente'),
            ]);

        $botman->ask($question, function (Answer $answer) {

            $alternativa = $answer->getText();

            $this->say($alternativa);
        });
    }

    /**
     * Place your BotMan logic here.
     */
    public  function  askName($botman)
    {
        $botman = resolve('botman');

        $question = Question::create('')
            ->callbackId('agree')
            ->addButtons([
                button::create('Notas parciales')->value('has pinchado las otas parciales'),
                button::create('Informacion academica')->value('has pinchado la inf academica'),
                button::create('Inscripción de cursos')->value('has pinchado  insc curso'),
                button::create('Documentos')->value('has pinchado los documentos'),
            ]);

        $botman->ask($question, function (Answer $answer) {

            $alternativa = $answer->getText();

            $this->say($alternativa);
        });
    }
}
