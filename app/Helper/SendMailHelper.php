<?php

namespace App\Helper;

use Illuminate\Support\Facades\Mail;

class SendMailHelper
{
    static function sendMailTo($receiver, $data, $emailTemplate)
    {
        return  Mail::send($emailTemplate, (array) $data, function ($message) use ($receiver, $data) {
            $message->subject($data["subject"]);
            $message->from("olvanotjcs@gmail.com", "Fiombonan'ny Malagasy Eto Torkia");
            $message->to($receiver);
        });
    }
}
