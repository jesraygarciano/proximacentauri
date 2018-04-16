<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

//QUESTION_DETECT : なんでここにクラスがないの？ララ帳（https://laravel10.wordpress.com/2015/05/25/events/）みたいに。

class NotificationEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($_data)
    {
        $this->data = $_data;
    }

    public function broadcastOn()
    {
        return ['notification-channel'];
        //QUESTION_DETECT : ララ帳だとここは空なんだけど。。。
    }
}

//QUESTION_DETECT : listener側は？
