<?php

namespace App\Services;

use App\Models\Student;

class StudentService {

    public function all() {

        return Student::all();
    }

    public function create($input) {

        $maxOrder = Student::where('school_id', $input["school_id"])->max('order');

        $input["order"] = $maxOrder + "1";

        return Student::create($input);
    }

    public function update($input, $student) {
        

        $student->name = $input['name'];
        $student->save();
        return $student;
    }

    public function delete($student) {

        return $student->delete();
    }

}
