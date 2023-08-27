<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            'data'=>Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'=>['required']
        ]);

        Course::create($input);

        return response()->json([
            'message'=>'tam'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);

        return response()->json([
            'data'=>$course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'name'=>['required'],

        ]);
        $course = Course::findOrFail($id);
        $course->update($input);

        return response()->json([
            'data'=> $course
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json([
            'message'=>'deleted'
        ]);
    }
}
