<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * __construct
     *
     * @param  \App\Repositories\TeacherRepository $teacherRepository
     * @return void
     */
    function __construct(private TeacherRepository $teacherRepository)
    {
    }

    /**
     * Get All teacher
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \App\Repositories\StudentRepository $teacherRepository
     */
    public function index(Request $request)
    {
        $request->validate(['limit' => 'integer|max:200']);
        return TeacherResource::collection($this->teacherRepository->show_all_teacher());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TeacherRequest  $request
     * @return \App\Repositories\StudentRepository $teacherRepository
     */
    public function store(TeacherRequest $request)
    {
        return $this->teacherRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $teahcer_id
     * @return \App\Repositories\StudentRepository $teacherRepository
     */
    public function show($teahcer_id)
    {
        return $this->teacherRepository->show_teacher($teahcer_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TeacherRequest  $request
     * @param  String  $teahcer_id
     * @return \App\Repositories\StudentRepository $teacherRepository
     */
    public function update($teahcer_id,TeacherRequest $request)
    {
        return $this->teacherRepository->update($teahcer_id,$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $teahcer_id
     * @return \App\Repositories\StudentRepository $teacherRepository
     */
    public function destroy($teahcer_id)
    {
        return $this->teacherRepository->destroy($teahcer_id);
    }
}
