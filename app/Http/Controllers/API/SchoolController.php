<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\SchoolRequest;
use App\Services\SchoolService;
use App\Models\School;

class SchoolController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchoolService $schoolService) {

        try {

            $schools = $schoolService->all();
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($schools, 'school list successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request, SchoolService $schoolService) {

        try {

            $school = $schoolService->create($request->input());
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($school, 'school stored successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(School $school, SchoolRequest $request, SchoolService $schoolService) {

        try {

            $updatedSchool = $schoolService->update($request->input(), $school);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($updatedSchool, 'school updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school, SchoolService $schoolService) {

        try {
            $message = $schoolService->delete($school) ? 'school deleted successfully.' : "school attached to students can't delete it.";
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse([], $message);
    }

}
