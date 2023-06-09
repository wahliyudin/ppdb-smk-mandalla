<?php

namespace App\Jobs;

use App\Mail\TesOnline as MailTesOnline;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TesOnline implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $urlTesOnline;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $urlTesOnline)
    {
        $this->email = $email;
        $this->urlTesOnline = $urlTesOnline;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new MailTesOnline($this->urlTesOnline));
    }
}