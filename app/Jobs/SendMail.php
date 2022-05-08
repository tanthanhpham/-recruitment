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

    protected $jobs;
    protected $employee;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($jobs, $employee)
    {
        $this->jobs = $jobs;
        $this->employee = $employee;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->employee->email)->send(new MailNotify($this->jobs, $this->employee));
    }
}
