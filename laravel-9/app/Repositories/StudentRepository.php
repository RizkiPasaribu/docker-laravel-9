<?php

namespace App\Repositories;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Teacher;

class StudentRepository
{


    /**
     * Show_all_student
     *
     * @param  Integer $limit
     * @return \App\Models\Student::paginate
     */
    public function show_all_student($limit = 25,)
    {
        return Student::paginate($limit);
    }


    /**
     * Store
     *
     * @param \App\Http\Requests\StudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $validator = $request->validated();
        return response()->create(Student::create($validator));
    }

    /**
     * Update
     *
     * @param  String $student_id
     * @param  \App\Http\Requests\StudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($student_id, StudentRequest $request)
    {
        $student = Student::find($student_id);
        $teacher = Teacher::find($request->teacher_id);
        if (!$student || !$teacher) {
            return response()->not_found("Student or Teacher");
        } else {
            $student->nama = $request->nama;
            $student->kelas = $request->kelas;
            $student->nim = $request->nim;
            $student->alamat = $request->alamat;
            $student->teacher_id = $request->teacher_id;
            $student->save();
            return response()->updated($student);
        }
    }

    /**
     * Destroy
     *
     * @param String $student_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        $student = Student::find($student_id);
        if (!$student) {
            return response()->not_found("Student");
        } else {
            $student->delete();
            return response()->deleted();
        }
    }

    /**
     * show_student
     *
     * @param  String $student_id
     * @return \Illuminate\Http\Response
     */
    public function show_student($student_id)
    {
        $student = Student::find($student_id);
        if (!$student) {
            return response()->not_found("Student");
        } else {
            return response()->json($student);
        }
    }
}
