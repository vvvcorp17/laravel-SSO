<?php


namespace App\Http\Controllers;


class Telegram
{
    public static function send($message)
    {
        if(!is_string($message)){
            $message = json_encode($message);
        }

        $url = 'https://api.telegram.org/bot808360334:AAG32-tKTqypxVdrdyXworvbji7ga_JmZKg/sendMessage?chat_id=523159028&text=';

        file_get_contents($url.$message);
    }
}
