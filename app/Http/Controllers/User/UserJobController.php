<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\Job;
use App\Models\User;

class UserJobController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->jobs);
    }

    public function update(User $user, Job $job)
    {
        $user->jobs()->attach($job->id);
        return $this->showAll($user->jobs);
    }

    public function destroy(User $user, Job $job)
    {
        if (!$user->jobs()->find($job->id)) {
            return $this->errorResponse('El cargo especificado no esta asignado al usuario', 404);
        }
        $user->jobs()->detach($job->id);
        return $this->showAll($user->jobs);
    }
}
