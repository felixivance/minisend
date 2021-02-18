<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendEmailViaSendGrid extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdfData = file_get_contents(base_path('public/attachments/'.$this->data['attachment']));

        $address = "felix@kodipay.com";
        $subject = $this->data['subject'];
        $name = Auth::user()->firstName.' '.Auth::user()->lastName;
// ->cc($address, $name)
//            ->bcc($address, $name)
        return $this->view('emails.test_html')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->attachData($pdfData, 'attachment.pdf', [
                'mime' => 'application/pdf',
            ])
            ->with([ 'content' => $this->data['content'] ]);

    }
}
