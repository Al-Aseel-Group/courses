<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherSkillRequest;
use App\Models\Teacher;
use App\Models\TeacherSkill;
use Illuminate\Http\Request;

class TeacherSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherSkillRequest $request,$teacherId)
    {
        $input = $request->validated();

        $teacher = Teacher::findOrFail($teacherId);

        $teacher->skills()->create($input);

        // TeacherSkill::create([
        //     'name'=>$input['name'],
        //     'teacher_id'=>$teacher->id
        // ]);

        return response()->json([
            'message'=>'skill been added'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($teacherId,$skillId)
    {
        $skill = TeacherSkill::where('teacher_id',$teacherId)->where('id',$skillId)->firstOrFail();
        $skill->delete();
        return response()->json([
            'message'=>'skill deleted'
        ]);
    }
}
