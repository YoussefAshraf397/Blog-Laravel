@extends('layouts.backend.app')

@section('title','Package')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-lg-9 col-12 mx-auto">

        <div class="card card-body mt-4">
            <form action="{{ route('admin.package.update',$package->id) }}" method="POST"
                  enctype="multipart/form-data" id = 'identifier'>
                @csrf
                @method('PUT')

                @php
                    $nameArray = json_decode($package->name, true);
                @endphp
                <h6 class="mb-0">Edit Package</h6>
                <p class="text-sm mb-0">Edit the package</p>
                <hr class="horizontal dark my-3">
                <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                        <label>Name EN</label>
                        <input name="name_en" class="multisteps-form__input form-control" type="text" value="{{$nameArray['en']}}" />
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Name AR</label>
                        <input name="name_ar" class="multisteps-form__input form-control" type="text" value="{{$nameArray['ar']}}" />
                    </div>
                </div>

                <label>Status</label>
                <select name="type" class="multisteps-form__select form-control">
                    <option value="optional" {{$package->type == 'optional' ? 'selected="selected"' : '' }}>Optional</option>
                    <option value="required" {{$package->type == 'required' ? 'selected="selected"' : '' }}>Required</option>
                </select>

                <div class="d-flex justify-content-end mt-4">
                    <a type="button"  href="{{ route('admin.package.index') }}" class="btn btn-light m-0">Cancel</a>
                    <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update package</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@push('js')
@endpush
