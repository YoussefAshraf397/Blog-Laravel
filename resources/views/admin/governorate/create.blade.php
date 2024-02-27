@extends('layouts.backend.app')

@section('title','Governorate')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">

            <div class="card card-body mt-4">
                <form action="{{ route('admin.governorate.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="mb-0">New Governorate</h6>
                    <p class="text-sm mb-0">Create new governorate</p>
                    <hr class="horizontal dark my-3">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Name EN</label>
                            <input name="name_en" class="multisteps-form__input form-control" type="text" placeholder="cairo" />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>Name AR</label>
                            <input name="name_ar" class="multisteps-form__input form-control" type="text" placeholder="القاهرة" />
                        </div>
                    </div>

                    <label>Country</label>
                    <select name="country_id" class="multisteps-form__select form-control">
                        <option selected="selected">...</option>

                    @foreach($countries as $country)
                    @php
                        $nameArray = json_decode($country->name, true);
                    @endphp
                        <option value="{{ $country->id }}">{{ $nameArray['en']}}</option>
                    @endforeach
                </select>
            <div class="d-flex justify-content-end mt-4">
            <a type="button"  href="{{ route('admin.governorate.index') }}" class="btn btn-light m-0">Cancel</a>
            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create City</button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
@endsection

@push('js')
@endpush

