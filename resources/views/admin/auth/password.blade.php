@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('section')
    @php
        $breadcrumbs = [
            [ 'name' => 'Dashboard', 'url' => route('admin.dashboard') ],
            [ 'name' => 'Profile', 'url' => route('admin.ProfilePage') ],
            ['name' => 'Update Password', 'url' => '']
        ];
    @endphp

    <div class="container">
        
        <div class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="title m-0">Manage Profile</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#" class="btn btn-primary">
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body pt-0">
                                <form action="{{ route('admin.update.password') }}" method="POST" class="mt-3">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" name="password" placeholder="Enter your new password" class="form-control">
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm your new password" class="form-control">
                                        <span class="text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
