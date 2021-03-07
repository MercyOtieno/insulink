@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Update Personal Information</h4>
    </div>
    <div class="card-body">
        <form action="{{route('customer.profile.update', $user->id)}}" method="post">
            @csrf
            @method('put')
            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach
           <div class="row">
               <div class="col-sm-6">
                   <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                    </div>
               </div>
               <div class="col-sm-6">
                   <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                    </div>
               </div>
               <div class="col-sm-12">
                   <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                    </div>
               </div>
           </div>
           <button type="submit" class="btn btn-secondary">Update Profile</button>
        </form>
    </div>
</div>
<div class="card my-6">
    <div class="card-header">
        <h4>
            Update Password Information
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('customer.change.password')}}" method="post">
            @csrf
            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
            
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="current_password"
                        autocomplete="current-password">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
            
                <div class="col-md-6">
                    <input id="new_password" type="password" class="form-control" name="new_password"
                        autocomplete="current-password">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
            
                <div class="col-md-6">
                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password"
                        autocomplete="current-password">
                </div>
            </div>
            
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection