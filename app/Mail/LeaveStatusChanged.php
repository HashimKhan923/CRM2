<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Leave;

class LeaveStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $leave;

    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
    }

    public function build()
    {
        return $this->subject("Leave #{$this->leave->id} - {$this->leave->status}")
                    ->view('mails.leave_status_changed')
                    ->with(['leave' => $this->leave]);
    }
}
