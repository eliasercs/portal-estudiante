<?php

namespace App\Conversations;

use App\Values\Operator;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class Operations extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->askOperations();
    }

    private function askOperations()
    {
        $question = Question::create('Las secciones mas vistas:')
            ->fallback('No se pudo responder la pregunta')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Notas')->value('N'),
                Button::create('Cursos inscritos')->value('C'),
                Button::create('Documentos')->value('D'),
                Button::create('Inscripcion')->value('I'),
                Button::create('Desincribir curso')->value('B'),
            ]);
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $content = Operator::getStrategy($answer->getValue());
                $this->say((new $content)->process());
            }
        });
    }
}
