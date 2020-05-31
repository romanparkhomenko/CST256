@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="col-md-12 profile-data">
                <img class="img-fluid rounded my-1" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="face">
                <h4 class="profile-name">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h4>
                <h5 class="profile-jobtitle">{{ Auth::user()->jobtitle }}</h5>
                <p class="profile-about"><span class="font-weight-bold">About: </span>{{ Auth::user()->about }}</p>
                <p class="profile-email"><span class="font-weight-bold">Email: </span>{{ Auth::user()->email }}</p>
                <p class="profile-phone"><span class="font-weight-bold">Phone: </span>{{ Auth::user()->phone }}</p>
            </div>
        </div>

        <div class="col-md-9 profile-resume">
            <h3 class="resume-header">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname . ', ' . Auth::user()->jobtitle  }}</h3>
            <div class="col-md-12 skills">
                <h3>My Skills</h3>
                <p>{{ Auth::user()->skills }}</p>
            </div>

            <div class="col-md-12 job-history">
                <h3>My Job History</h3>
                <p>{{ Auth::user()->jobhistory }}</p>
            </div>

            <div class="col-md-12 education">
                <h3>My Education</h3>
                <p>{{ Auth::user()->education }}</p>
            </div>
        </div>


    </div>
</div>
@endsection
