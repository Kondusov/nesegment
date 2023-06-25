<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\StatusLotEmail;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller

{

    static function sendStatusInWork($ownerPostEmail, $favoritUserPostEmail, $postLink, $eventMessage)

    {

        $objDemo = new \stdClass();

        if($eventMessage == 2){
            $objDemo->lot_status = 'Лот в работе.';
        }
        elseif($eventMessage == 3){

            $objDemo->lot_status = 'Лот завершен.';
        }
        else{
            $objDemo->lot_status = 'Подача заявок.'; // $eventMessage == 1
        }

        $objDemo->lot_link = $postLink;

        $objDemo->lot_timeChainge = now();

        $objDemo->receiver = 'NeSegment';
        //dd($ownerPostEmail, $favoritUserPostEmail, $postLink, $eventMessage, $objDemo->lot_timeChainge);
        Mail::to([$ownerPostEmail, $favoritUserPostEmail])->send(new StatusLotEmail($objDemo));


    }

    public function sendStatusComplete($lot_link)

    {

        $objDemo = new \stdClass();

        $objDemo->demo_one = 'Работа с лотом завершена.';

        $objDemo->demo_two = 'Demo Two Value';

        $objDemo->sender = 'SenderUserName';

        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("kondusov.ru@gmail.com")->send(new StatusLotEmail($objDemo));

    }

}
