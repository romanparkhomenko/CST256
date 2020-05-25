@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Admin Dashboard</h3>
            <div class="content">
                <p>Manage Users</p>
            </div>

            <div class="row justify-content-start">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>User ID</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Job Title</td>
                            <td>Is Admin?</td>
                            <td>Edit</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->jobtitle}}</td>
                                <td>{{$user->isAdmin == 1 ? 'Yes' : 'No'}}</td>
                                <td>
                                    <a href="{{ route("editUser", $user->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($activeUser ?? '')
                    <div class="col-md-6">
                        <h4>Edit User</h4>
                        @include('updateAdmin')
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
