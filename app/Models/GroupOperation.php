<?php

namespace App\Models;

use App\Models\Api\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupOperation extends Model
{
    use HasFactory;
    protected $table = 'group_operations';
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function meetingTime()
    {
        return $this->belongsTo(MeetingTime::class, 'meeting_times_id');
    }

    public function course()
    {
        return $this->belongsTo(Webinar::class, 'course_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'group_operation_student', 'group_id', 'student_id');
    }
}
