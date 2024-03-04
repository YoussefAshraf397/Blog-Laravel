@extends('layouts.backend.app')

@section('title','Bank')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <div class="card card-body mt-4">
                    <form action="{{ route('admin.bank.store') }}" method="POST" enctype="multipart/form-data" id="identifier">
                        @csrf
                        <h6 class="mb-0">New Bank</h6>
                        <p class="text-sm mb-0">Create bank</p>
                        <hr class="horizontal dark my-3">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label>Name EN</label>
                                <input name="name_en" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label>Name AR</label>
                                <input name="name_ar" class="multisteps-form__input form-control" type="text" placeholder="..." />
                            </div>
                        </div>

                        <label>status</label>
                        <select name="status" class="multisteps-form__select form-control">
                            <option selected="selected">...</option>
                            <option value="1">Active</option>
                            <option value="0">Suspend</option>
                        </select>

                        <label class="mt-4 form-label">Icon image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="icon" lang="en">
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a type="button"  href="{{ route('admin.bank.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create Bank</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush

