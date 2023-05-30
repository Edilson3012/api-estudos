<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $model;

    public function __construct(Module $module)
    {
        $this->model = $module;
    }

    public function getAllModules()
    {
        return $this->model->get();
    }

    public function getModule(string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function getModulesCourseById(string $courseId)
    {
        return $this->model->where('course_id', $courseId)->get();
    }
}
