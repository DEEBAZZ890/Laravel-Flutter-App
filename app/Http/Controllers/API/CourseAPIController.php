<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreCourseAPIRequest;
use App\Http\Requests\UpdateCourseAPIRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class CourseAPIController extends ApiBaseController
{
    public function index(): JsonResponse
    {
        $courses = Course::paginate(10);
        return $this->sendResponse($courses, "Courses retrieved successfully.");
    }

    public function store(StoreCourseAPIRequest $request): JsonResponse
    {
        $course = Course::create($request->validated());
        return $this->sendResponse($course, "Course created successfully.");
    }

    public function show(int $id): JsonResponse
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->sendError("Course not found.");
        }

        return $this->sendResponse($course, "Course retrieved successfully.");
    }

    public function update(UpdateCourseAPIRequest $request, int $id): JsonResponse
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->sendError("Course not found.");
        }

        $course->update($request->validated());
        return $this->sendResponse($course, "Course updated successfully.");
    }

    public function destroy(int $id): JsonResponse
    {
        $course = Course::find($id);

        if (!$course) {
            return $this->sendError("Course not found.");
        }

        $course->delete();
        return $this->sendResponse(null, "Course deleted successfully.");
    }
}
