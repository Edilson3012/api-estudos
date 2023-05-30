<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function getAllCourses()
    {
        return $this->model->get();
    }

    public function getCourse(string $id)
    {
        return $this->model->findOrFail($id);
    }
}
