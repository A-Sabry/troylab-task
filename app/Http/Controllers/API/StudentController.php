<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\StudentRequest;
use App\Services\StudentService;
use App\Models\Student;

class StudentController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentService $studentService) {

        try {

            $schools = $studentService->all();
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($schools, 'student list successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request, StudentService $studentService) {

        try {

            $school = $studentService->create($request->input());
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($school, 'school retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student, StudentRequest $request, StudentService $studentService) {

        try {

            $school = $studentService->update($request->input(), $student);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($school, 'student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, StudentService $studentService) {


        try {

            $studentService->delete($student);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse([], 'student deleted successfully.');
    }

}
