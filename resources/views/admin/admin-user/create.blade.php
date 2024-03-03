@extends('layouts.backend.app')

@section('title','Admin User')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">

            <div class="card card-body mt-4">
                <form action="{{ route('admin.admin-user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="mb-0">New City</h6>
                    <p class="text-sm mb-0">Create new admin user</p>
                    <hr class="horizontal dark my-3">

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Name</label>
                            <input name="name" class="multisteps-form__input form-control" type="text" placeholder="name of user" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>email</label>
                            <input name="email" class="multisteps-form__input form-control" type="text" placeholder="email@email.com" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Country Code</label>
                            <input name="country_code" class="multisteps-form__input form-control" type="text" placeholder="02" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>Phone</label>
                            <input name="phone" class="multisteps-form__input form-control" type="text" placeholder="010" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Status</label>
                            <select name="status" class="multisteps-form__select form-control">
                                <option selected="selected">...</option>
                                @foreach($userStatuses as $userStatus)
                                    <option value="{{$userStatus}}">{{$userStatus}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>User Type</label>
                            <select name="type" class="multisteps-form__select form-control">
                                <option selected="selected">...</option>
                                @foreach($userTypes as $userType)
                                    <option value="{{$userType}}">{{$userType}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>User Gender</label>
                            <select name="gender" class="multisteps-form__select form-control">
                                <option selected="selected">...</option>
                                @foreach($userGenders as $userGender)
                                    <option value="{{$userGender}}">{{$userGender}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>User Country</label>
                            <select name="country_id" class="multisteps-form__select form-control">
                                <option selected="selected">...</option>
                                @foreach($countries as $country)
                                    @php
                                        $nameArray = json_decode($country->name, true);
                                    @endphp
                                    <option value="{{ $country->id }}">{{ $nameArray['en']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <label for="code" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="********">

                    <label class="mt-4 form-label">Profile Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="profile_image" lang="en">
                        <label class="custom-file-label" for="customFileLang">Select file</label>
                    </div>


                    <div class="d-flex justify-content-end mt-4">
            <a type="button"  href="{{ route('admin.admin-user.index') }}" class="btn btn-light m-0">Cancel</a>
            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create Admin User</button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
@endsection

@push('js')
@endpush

