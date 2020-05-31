<?php

namespace App\Http\Controllers;

use App\JobPosts;
use App\Models\JobModels;
use App\Services\Business\SecurityService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function updateJob(Request $request) {
        $id = $request->input('id');
        $companyname = $request->input('companyname');
        $jobtitle = $request->input('jobtitle');
        $salary = $request->input('salary');
        $description = $request->input('description');
        $city = $request->input('city');
        $updatedAt = now();

        $job = new JobModels($companyname, $jobtitle);
        $job->setId($id);
        $job->setSalary($salary);
        $job->setDescription($description);
        $job->setCity($city);
        $job->setUpdatedAt($updatedAt);

        $service = new SecurityService();
        $status = $service->updateJob($job);

        $users = User::all();
        $jobs = JobPosts::all();

        if ($status){
            $data = [
                'users' => $users,
                'jobs' => $jobs
            ];
            return view('admin')->with($data);
        } else {
            return view('updateFailed');
        }
    }
}
