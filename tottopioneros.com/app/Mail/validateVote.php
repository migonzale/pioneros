<?php

namespace App\Mail;

use App\Project;
use App\Voter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class validateVote extends Mailable
{
    use Queueable, SerializesModels;

    public $voter;
    public $project;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Voter $voter, Project $project, $token)
    {
        $this->voter = $voter;
        $this->project = $project;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@totto.com')
            ->view('email.validateVote');
    }
}
