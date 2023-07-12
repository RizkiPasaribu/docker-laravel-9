<?php

namespace App\Repositories;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentRepository
{


    /**
     * Show_all_student
     *
     * @param  Integer $limit
     * @return \App\Models\Student
     */
    public function show_all_student($limit = 25)
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
        // handle file photo
        $file = null;
        if ($request->photo)$file = $request->photo->store('images','public');

        // store
        $student = new Student;
        $student->nama = $request->nama;
        $student->kelas = $request->kelas;
        $student->nim = $request->nim;
        $student->alamat = $request->alamat;
        $student->photo = $file;
        $student->teacher_id = $request->teacher_id;
        $student->save();
        return response()->create(new StudentResource($student));
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
        // handle file photo
        $file = null;
        if ($request->photo)$file = $request->photo->store('images','public');
        if (!$student) {
            return response()->not_found("Student, Teacher and Course");
        } else {
            // deleted photo
            Storage::delete('public/'.$student->photo);

            $student->nama = $request->nama;
            $student->kelas = $request->kelas;
            $student->nim = $request->nim;
            $student->alamat = $request->alamat;
            $student->photo = $file;
            $student->teacher_id = $request->teacher_id;
            $student->save();
            return response()->updated(new StudentResource($student));
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
        $student = Student::with('courses')->find($student_id);
        if (!$student) {
            return response()->not_found("Student");
        } else {
            return response()->json(new StudentResource($student));
        }
    }
}
