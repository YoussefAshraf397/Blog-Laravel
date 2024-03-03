@extends('layouts.backend.app')

@section('title','Role')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <div class="card card-body mt-4">
                    <form action="{{ route('admin.role.update',$role->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h6 class="mb-0">Edit Role</h6>
                        <p class="text-sm mb-0">Edit the role</p>
                        <hr class="horizontal dark my-3">

                        <label for="code" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}">


                        <div class="d-flex justify-content-end mt-4">
                            <a type="button"  href="{{ route('admin.role.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
