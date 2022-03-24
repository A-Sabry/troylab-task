<?php

namespace App\Services;

use App\Models\School;

class SchoolService {

    public function all() {

        return School::all();
    }

    public function create($input) {

        return School::create($input);
    }

    public function update($input, $school) {

        $school->name = $input['name'];
        $school->save();

        return $school;
    }

    public function delete($school) {


        return $this->checkStudent($school) ? false : $school->delete();
    }

    public function checkStudent($school) {

        return (!($school->students)->isEmpty()) ? true : false;
    }

}
