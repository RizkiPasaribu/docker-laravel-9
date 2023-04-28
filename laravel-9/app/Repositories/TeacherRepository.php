<?php

namespace App\Repositories;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherRepository{
    /**
     * Show_all_teacher
     *
     * @param  Integer $limit
     * @return \App\Models\Teacher
     */
    public function show_all_teacher($limit = 25)
    {
        return Teacher::with('student')->paginate($limit);
    }

    /**
     * Store
     *
     * @param \App\Http\Requests\TeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $validator = $request->validated();
        return response()->create(Teacher::create($validator));
    }

    /**
     * Show teacher
     *
     * @param  String $teacher_id
     * @return \Illuminate\Http\Response
     */
    public function show_teacher($teacher_id)
    {
        $teacher = Teacher::with('student')->find($teacher_id);
        if (!$teacher) {
            return response()->not_found("Teacher");
        } else {
            return response()->json($teacher);
        }
    }

    /**
     * Destroy
     *
     * @param String $teacher_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($teacher_id)
    {
        $teacher = teacher::find($teacher_id);
        if (!$teacher) {
            return response()->not_found("Teacher");
        } else {
            $teacher->delete();
            return response()->deleted();
        }
    }

    /**
     * Update
     *
     * @param  String $teacher_id
     * @param  \App\Http\Requests\TeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($teacher_id, TeacherRequest $request)
    {
        $teacher = Teacher::find($teacher_id);
        if (!$teacher) {
            return response()->not_found("Teacher");
        } else {
            $teacher->nama = $request->nama;
            $teacher->nid = $request->nid;
            $teacher->alamat = $request->alamat;
            $teacher->save();
            return response()->updated($teacher);
        }
    }
}
