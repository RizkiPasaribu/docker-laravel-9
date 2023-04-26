<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * __construct
     *
     * @param  \App\Repositories\StudentRepository $studentRepo
     * @return void
     */
    function __construct(protected StudentRepository $studentRepo)
    {
    }

    /**
     * index
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \App\Repositories\StudentRepository $studentRepo
     */
    public function index(Request $request)
    {
        $request->validate(['limit' => 'integer|max:200']);
        return $this->studentRepo->show_all_student($request->limit);
    }

    /**
     * Create / simpan Student
     *
     * @param \App\Http\Requests\StudentRequest $request
     * @return App\Repositories\StudentRepository $studentRepo
     */
    public function store(StudentRequest $request)
    {
        return $this->studentRepo->store($request);
    }

    /**
     * Delete Student
     *
     * @param String $student_id
     * @return App\Repositories\StudentRepository $studentRepo
     */
    public function destroy($student_id)
    {
        return  $this->studentRepo->destroy($student_id);
    }

    /**
     * Update Student
     *
     * @param student_uuid
     * @param String $student_id
     * @param \App\Http\Requests\StudentRequest $request
     * @return App\Repositories\StudentRepository $studentRepo
     */
    public function update($student_id, StudentRequest $request)
    {
        return $this->studentRepo->udpate($student_id, $request);
    }

    /**
     * show
     *
     * @param  String $student_id
     * @return App\Repositories\StudentRepository $studentRepo
     */
    public function show($student_id)
    {
        return $this->studentRepo->show_student($student_id);
    }
}
