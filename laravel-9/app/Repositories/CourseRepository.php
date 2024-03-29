<?php

namespace App\Repositories;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Student;

class CourseRepository
{
    /**
     * Show_all_course
     *
     * @param  Integer $limit
     * @return \App\Models\Course
     */
    public function show_all_course($limit = 25,)
    {
        return Course::with('students')->paginate($limit);
    }

    /**
     * Store
     *
     * @param \App\Http\Requests\CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $validator = $request->validated();
        return response()->create(Course::create($validator));
    }

    /**
     * Destroy
     *
     * @param String $course_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        $course = Course::find($course_id);
        if (!$course) {
            return response()->not_found("Course");
        } else {
            $course->delete();
            return response()->deleted();
        }
    }

    /**
     * show_course
     *
     * @param  String $course_id
     * @return \Illuminate\Http\Response
     */
    public function show_course($course_id)
    {
        $course = Course::with('students')->find($course_id);
        if (!$course) {
            return response()->not_found("Course");
        } else {
            return response()->json($course);
        }
    }

    /**
     * Update
     *
     * @param  String $course_id
     * @param  \App\Http\Requests\courseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($course_id, courseRequest $request)
    {
        $course = Course::find($course_id);
        $student = Student::find($request->student_id);
        if (!$course || $student) {
            return response()->not_found("Course or Student");
        } else {
            $course->nama = $request->nama;
            $course->code = $request->code;
            $course->students()->attach($request->student_id);
            $course->save();
            return response()->updated($course);
        }
    }
}
