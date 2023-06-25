<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Queue\ShouldQueue;

class UserSendEmail extends Mailable

{

    use Queueable, SerializesModels;

    

    /**

* The work object instance.

*

* @var Work

*/

    public $work;

    /**

* Create a new message instance.

*

* @return void

*/

    public function __construct($workMessage)

    {

        $this->work = $workMessage;

    }

    /**

* Build the message.

*

* @return $this

*/

    public function build($workMessage)

    {
        dd($workMessage);

        if($workMessage->event_message == 2){
            $view_page = 'mail.inwork_best_post';

        }
        elseif($workMessage->event_message == 3){
            $view_page = 'mail.complete_work_best_post';
        }

        return $this->from('kondusov.aa@yandex.ru')

                    ->view($view_page)

                    ->text('mail.demo_plain')
                    
                    ->with(['one' => '1'
                ]);

    }

}
