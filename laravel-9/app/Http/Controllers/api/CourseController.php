<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * __construct
     *
     * @param  \App\Repositories\CourseRepository courseRepo
     * @return void
     */
    function __construct(protected CourseRepository $courseRepo)
    {
    }


    /**
     * Get All Course
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \App\Repositories\CourseRepository $courseRepo
     */
    public function index(Request $request)
    {
        $request->validate(['limit' => 'integer|max:200']);
        return $this->courseRepo->show_all_course($request->limit);
    }

    /**
     * Create / simpan Course
     *
     * @param \App\Http\Requests\CourseRequest $request
     * @return \App\Repositories\CourseRepository $courseRepo
     */
    public function store(CourseRequest $request)
    {
        return $this->courseRepo->store($request);
    }

    /**
     * Delete Course
     *
     * @param String course_id
     * @return \App\Repositories\CourseRepository courseRepo
     */
    public function destroy($course_id)
    {
        return  $this->courseRepo->destroy($course_id);
    }

    /**
     * Show Course
     *
     * @param  String $course_id
     * @return \App\Repositories\CourseRepository $courseRepo
     */
    public function show($course_id)
    {
        return $this->courseRepo->show_course($course_id);
    }

    /**
     * Update Course
     *
     * @param course_uuid
     * @param String $course_id
     * @param \App\Http\Requests\CourseRequest $request
     * @return \App\Repositories\CourseRepository $courseRepo
     */
    public function update($course_id, CourseRequest $request)
    {
        return $this->courseRepo->update($course_id, $request);
    }
}
