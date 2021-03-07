@extends('core/base::layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-sm-4 text-right">
        <h2>Underwriter Details</h2>
        <p>Ensure you fill all the required fields</p>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-9">
                <div class="card card-body">
                    <form action="{{ route('underwriters.store') }}" method="POST" enctype="multipart/form-data" id="add_underwriters">
                        @csrf
                        <div class="form-group">
                            <label for="company">Company/Underwriter's Name</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company/Underwriter's Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Physical Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Physical Address">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                            <small id="emailHelp" class="form-text text-muted">only png/jpeg</small>
                        </div>
                        <div class="form-group">
                            <label for="api_key">API Key</label>
                            <input type="email" class="form-control" id="api_key" name="api_key" placeholder="Enter API Key">
                        </div>
                        <div class="form-group">
                            <label for="api_secret">API Secret Key</label>
                            <input type="email" class="form-control" id="api_secret" name="api_secret" placeholder="Enter API Secret Key">
                        </div>
                        <div class="form-group">
                            <label for="api_email">API Username</label>
                            <input type="email" class="form-control" id="api_email" name="api_email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="api_password">API Password</label>
                            <input type="email" class="form-control" id="api_password" name="api_password" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="api_prod_url">API Production URL</label>
                            <input type="email" class="form-control" id="api_prod_url" name="api_prod_url" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="api_uat_url">API UAT URL</label>
                            <input type="text" class="form-control" id="api_uat_url" name="api_uat_url" placeholder="API UAT URL">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Underwriter</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
</div>
@endsection