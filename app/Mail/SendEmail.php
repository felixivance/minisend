<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels,MailerSendTrait;

    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $data
//        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
//     ->attachFromStorageDisk('public', 'example.png')
    public function build()
    {
        \Log::info("data in mail send");

        $to = Arr::get($this->to,'0.address');
        \Log::info($to);
        return $this->view('emails.test_html')
            ->text('emails.test_text')
            ->mailersend(
                null,
                [
                    new Variable($to, ['name' => 'Felix'])
                ],
                ['tag']
            );
    }
}
