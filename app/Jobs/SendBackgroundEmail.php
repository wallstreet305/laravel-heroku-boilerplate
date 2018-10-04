<?php

namespace OBS\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Message;
use Exception;
use Log;
use Mail;
use Config;

class SendBackgroundEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var mixed
     */
    protected $template;
    /**
     * @var array
     */
    protected $data;
    /**
     * @var string
     */
    protected $to_email;
    /**
     * @var string
     */
    protected $to_name;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var \Mailchimp
     */
    protected $mailchimp;
    /**
     * @var array
     */
    protected $conf;
    /**
     * @var
     */
    protected $is_local_template;

    public function __construct($template, array $data, $to_email, $to_name, $subject, $is_local_template = false)
    {
        $this->template = $template;
        $this->data = $data;
        $this->to_email = $to_email;
        $this->to_name = $to_name;
        $this->subject = $subject;
        $this->is_local_template = $is_local_template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::send($this->template, $this->data, function (Message $mail) {
                return $mail->to($this->to_email, $this->to_name)
                    ->subject($this->subject)
                    ->getSwiftMessage()
                    ->getHeaders();
            });
            Log::info('Email delivered to this email-address: ' . $this->to_email);
        } catch (Exception $e) {
            $this->delete();
            Log::error(
                'Background mail sending exception (SendBackGroundEmail::handle()):' . PHP_EOL .
                'File: ' . $e->getFile() . PHP_EOL .
                'Line: ' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL
            );
        }
    }
}
