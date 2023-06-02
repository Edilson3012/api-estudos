<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    protected $model;

    public function __construct(Support $support)
    {
        $this->model = $support;
    }

    public function getSupports(array $filters = [])
    {

        return $this
                    ->getUserAuth()
                    ->supports()
                    ->where(function($query) use ($filters){
                        if(isset($filters['lesson'])){
                            $query->where('lesson_id', $filters['lesson'] );
                        }
                        if(isset($filters['status'])){
                            $query->where('status', $filters['status'] );
                        }
                        if(isset($filters['description'])){
                            $query->where('description', 'LIKE',  "%{$filters['description']}%" );
                        }
                    })
                    ->get();
        // return $this->model->where()->get();
    }

    private function getUserAuth(): User
    {
        // return auth()->user();
        return User::first();
    }

    public function createNewSupport(array $data):Support{

        // dd($data);
        // dd($this->getUserAuth()->supports());
        $support =  $this->getUserAuth()->supports()->create([
            'lesson_id' => $data['lesson'],
            'status' => $data['status'],
            'description' => $data['description'],
        ]);

        return $support;
    }
}
