<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'chào bạn' || $message == 'chào') {
                $this->askName($botman);
            } else {
                $botman->reply("Viết 'chào bạn' để  thử...");
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Xin chào! Tên bạn là gì?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Rất vui được gặp bạn ' . $name. '!');
        });
    }
}