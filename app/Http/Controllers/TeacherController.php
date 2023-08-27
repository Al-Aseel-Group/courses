<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return response()->json([
            'data'=>$teachers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $input = $request->validated();

        Teacher::create($input);
        return response()->json([
            'message'=>'teacher created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json([
            'data'=>$teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {
        $input = $request->validated();
        $teacher = Teacher::findOrFail($id);
        $teacher->update($input);
        return response()->json([
            'data'=>$teacher
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json([
            'message'=>'teacher deleted'
        ]);
    }
}
