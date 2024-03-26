@extends('layouts.backend.app')

@section('title','User Bank Account')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <div class="card card-body mt-4">
                    <form action="{{ route('admin.user-bank-account.store') }}" method="POST" enctype="multipart/form-data" id="identifier">
                        @csrf
                        <h6 class="mb-0">New User Bank Account</h6>
                        <p class="text-sm mb-0">Create user bank account</p>
                        <hr class="horizontal dark my-3">

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label>User</label>
                                <select name="user_id" class="multisteps-form__select form-control">
                                    <option selected="selected">...</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label>Bank</label>
                                <select name="bank_id" class="multisteps-form__select form-control">
                                    <option selected="selected">...</option>
                                    @foreach($banks as $bank)
                                        @php
                                            $bankArray = json_decode($bank->name, true);
                                        @endphp
                                        <option value="{{$bank->id}}">{{$bankArray['en']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-4">
                                <label>Account Name</label>
                                <input name="account_name" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                            <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                <label>Branch Name</label>
                                <input name="branch_name" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                            <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                <label>IBAN</label>
                                <input name="iban" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label>Swift Code</label>
                                <input name="swift_code" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label>Account Number</label>
                                <input name="account_number" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label class="mt-4 form-label">Front image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="front_media" lang="en">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label class="mt-4 form-label">Back image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="back_media" lang="en">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a type="button"  href="{{ route('admin.user-bank-account.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create User Bank Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush

