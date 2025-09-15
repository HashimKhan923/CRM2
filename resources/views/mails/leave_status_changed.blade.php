<!doctype html>
<html>
<body>
<p>Hello {{ $leave->user->name }},</p>

<p>Your leave request ({{ $leave->leaveType->name }}) from {{ $leave->start_date->toDateString() }}
 to {{ $leave->end_date->toDateString() }} ({{ $leave->days }} days) has been <strong>{{ strtoupper($leave->status) }}</strong>.</p>

@if($leave->status === 'approved')
    <p>Approved by: {{ $leave->approver ? $leave->approver->name : 'Admin' }} on {{ $leave->approved_at }}</p>
@endif

@if($leave->reason)
    <p>Reason: {{ $leave->reason }}</p>
@endif

<p>Regards,<br/>HR System</p>
</body>
</html>
