<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Job\JobRequest;
use App\Http\Resources\Job\JobResource;
use App\Models\Job;

class JobController extends ApiController
{
    public function index()
    {
        $jobs = Job::all();
        $data = JobResource::collection($jobs);
        return $data;
    }

    public function store(JobRequest $request)
    {
        $job = Job::create($request->all());
        $data = new JobResource($job);
        return $data;

    }

    public function show(Job $job)
    {
        $data = new JobResource($job);
        return $data;
    }

    public function update(JobRequest $request, Job $job)
    {
        $job->update($request->all());
        $data = new JobResource($job);
        return $data;
    }

    public function destroy(Job $job)
    {
        $job->delete();
        $data = new JobResource($job);
        return $data;
    }
}
