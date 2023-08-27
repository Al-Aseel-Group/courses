<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentReqest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=>Student::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentReqest $request)
    {
        $input = $request->validated();

        Student::create($input);

        return response()->json([
            'message' => 'student created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return response()->json([
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentReqest $request, string $id)
    {
        $input = $request->validated();

        $student = Student::findOrFail($id);
        $student->update($input);
        return response()->json([
            'message' => 'student updated successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json([
            'message' => 'student deleted successfully'
        ]);
    }
}
