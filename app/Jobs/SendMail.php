<?php

namespace App\Jobs;

use Mail;
use App\Mail\MailNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $trans;
    protected $products;
    protected $sizes;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($trans,$products,$sizes)
    {
        $this->trans=$trans;
        $this->products=$products;
        $this->sizes=$sizes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->trans->email)->send(new MailNotify($this->trans,$this->products,$this->sizes));
    }
}
