<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    protected $jobs;
    protected $employee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobs, $employee)
    {
        $this->jobs = $jobs;
        $this->employee = $employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('phamtanthanh.it@gmail.com')
        ->view('admin.transaction.mail-notify')
        ->subject('Xác nhận đơn hàng');
    }
}
