<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api\User;
use App\Models\GroupOperation;
use App\Models\Meeting;
use App\Models\MeetingTime;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupOperationsController extends Controller
{
    public function list()
    {
        $this->authorize('admin_group_operations_list');
        $groupOperations = GroupOperation::with('instructor', 'course', 'meetingTime')->paginate(5);
        return view('admin.group_operations.list')->with([
            'groupOperations' => $groupOperations
        ]);
    }

    public function addStudentToGroup()
    {
        $this->authorize('admin_group_operations_add_student_to_group');
        $groups = GroupOperation::all();
        $students = User::where('role_name', 'user')->get();
        return view('admin.group_operations.add_student')->with([
            'groups' => $groups,
            'students' => $students
        ]);
    }

    public function addStudent(Request $request)
    {
        $this->authorize('admin_group_operations_add_student');
        DB::table('group_operation_student')->insert([
            'group_id' => $request->group,
            'student_id' => $request->student
        ]);

        $groupOperation = GroupOperation::paginate(10);
        return redirect()->route('adminGroupOperationsList')->with([
            'groupOperations' => $groupOperation
        ]);
    }

    public function deleteGroupStudent($groupId, $studentId)
    {
        DB::table('group_operation_student')->where([
            'group_id' => $groupId,
            'student_id' => $studentId
        ])->delete();

        return redirect()->back()->with([
            'message' => 'Student removed from group successfully.'
        ]);
    }

    public function addGroup()
    {
        $this->authorize('admin_group_operations_add_student_to_group');
        $instructors = User::where('role_name', 'teacher')->get();
        $courses = Webinar::where('type', 'course')->get();
        $meetingTimes = MeetingTime::all();
        $groupOperation = null;
        return view('admin.group_operations.add_group')->with([
            'instructors' => $instructors,
            'courses' => $courses,
            'meetingTimes' => $meetingTimes,
            'groupOperation' => $groupOperation
        ]);
    }

    public function getMeetingTimes($id)
    {
        $meeting = Meeting::where('creator_id', $id)->first();
        $meetingTimes = MeetingTime::where('meeting_id', $meeting->id)->get();
        return response()->json($meetingTimes);
    }

    public function exportExcel()
    {
        $this->authorize('admin_group_operations_export');

    }

    public function store(Request $request)
    {
        $this->authorize('admin_group_operations_store');
        GroupOperation::create([
            'name' => $request->name,
            'instructor_id' => $request->instructor,
            'course_id' => $request->course,
            'meeting_times_id' => $request->meetingTime,
            'group_type'=> $request->group_type,
            'age_level'=> $request->age_level,
            'study_level'=> $request->study_level,
            'language' => $request->language
        ]);

        $groupOperation = GroupOperation::paginate(10);
        return redirect()->route('adminGroupOperationsList')->with([
            'groupOperations' => $groupOperation
        ]);
    }

    public function sendNotification($id)
    {
        dd($id);
    }

    public function students($id)
    {
        $this->authorize('admin_group_operations_students_lists');
        $group = GroupOperation::findOrFail($id);
        $students = $group->students()->paginate(10);
        $groupOperation = GroupOperation::all();
        return view('admin.group_operations.student')->with([
            'groupOperations' => $groupOperation,
            'group' => $group,
            'students' => $students
        ]);
    }

    public function edit($id)
    {
        $this->authorize('admin_group_operations_edit');
        $groupOperation = GroupOperation::findOrFail($id);
        $instructors = User::where('role_name', 'teacher')->get();
        $courses = Webinar::where('type', 'course')->get();
        $meetingTimes = MeetingTime::all();
        return view('admin.group_operations.add_group')->with([
            'instructors' => $instructors,
            'courses' => $courses,
            'meetingTimes' => $meetingTimes,
            'groupOperation' => $groupOperation
        ]);
    }

    public function update(Request $request)
    {
        $this->authorize('admin_group_operations_update');
        $id = $request->id;
        $groupOperation = GroupOperation::findOrFail($id);
        $groupOperation->update([
            'name' => $request->name,
            'instructor_id' => $request->instructor,
            'course_id' => $request->course,
            'meeting_times_id' => $request->meetingTime,
            'group_type'=> $request->group_type,
            'age_level'=> $request->age_level,
            'study_level'=> $request->study_level,
            'language' => $request->language
        ]);

        return redirect()->route('adminGroupOperationsList')->with([
            'groupOperations' => GroupOperation::paginate(10)
        ]);
    }

    public function delete($id)
    {
        $this->authorize('admin_group_operations_delete');
        $groupOperation = GroupOperation::findOrFail($id);
        $groupOperation->delete();
        return redirect()->route('adminGroupOperationsList')->with([
            'groupOperations' => GroupOperation::paginate(10)
        ]);
    }
}
