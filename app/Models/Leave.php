<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','leave_type_id','start_date','end_date','days','status','reason','approved_by','approved_at'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'approved_at'=> 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public static function daysBetween($start, $end): int
    {
        return Carbon::parse($start)->diffInDays(Carbon::parse($end)) + 1;
    }

}
