<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCourseResource;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{


    public function addStudent($studentId,$teacherId,$courseId)
    {

        $studentId = Student::findOrFail($studentId)->id;
        $courseId = Course::findOrFail($courseId)->id;
        $teacherId = Teacher::findOrFail($teacherId)->id;




        $data= StudentCourse::create([
            'teacher_id' => $teacherId,
            'student_id'=>$studentId,
            'course_id'=>$courseId
        ]);


        return response()->json([
            'message'=>'student added'
        ]);
    }


    public function getStudent(Request $request)
    {
        $q = StudentCourse::query();


        if($request->has('teacher'))
        {
            $q->where('teacher_id',$request->teacher);
        }
        if($request->has('course'))
        {
            $q->where('course_id',$request->course);
        }

        if($request->has('student'))
        {
            $q->where('student_id',$request->student);
        }

        $stuents = $q->get();

        return StudentCourseResource::collection($stuents);
        // return (new StudentCourseResource($studentCourse));
    }
}
