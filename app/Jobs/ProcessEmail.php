<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $recipient = $this->email['recipient'];
        $sender = $this->email['sender'];
        $subject = $this->email['subject'];

        \Mail::send(isset($this->email['blade'])?$this->email['blade']:'', $this->email, function ($m) use ($recipient,$sender,$subject) {
            $m->from($sender->email, $sender->name);
            $m->to($recipient->email, $recipient->name)->subject($subject);
        });
    }
}
