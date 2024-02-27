@extends('layouts.backend.app')

@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-lg-9 col-12 mx-auto">

        <div class="card card-body mt-4">
            <form action="{{ route('admin.country.update',$country->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @php
                    $nameArray = json_decode($country->name, true);
                @endphp
                <h6 class="mb-0">Edit Country</h6>
                <p class="text-sm mb-0">Edit the country</p>
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

                <label for="code" class="form-label">Country Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{$country->code}}">

                <div class="d-flex justify-content-end mt-4">
                    <a type="button"  href="{{ route('admin.country.index') }}" class="btn btn-light m-0">Cancel</a>
                    <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update Country</button>
                </div>
            </form>
        </div>
    </div>
</div>
</
@endsection

@push('script')

@endpush
