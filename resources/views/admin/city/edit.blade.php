@extends('layouts.backend.app')

@section('title','Governorate')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-lg-9 col-12 mx-auto">

        <div class="card card-body mt-4">
            <form action="{{ route('admin.city.update',$city->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @php
                    $nameArray = json_decode($city->name, true);
                @endphp
                <h6 class="mb-0">Edit City</h6>
                <p class="text-sm mb-0">Edit the city</p>
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

                <label for="code" class="form-label">Name Soudex</label>
                <input type="text" class="form-control" id="name_soundex" name="name_soundex" value="{{$city->name_soundex}}">


                <label>Governorate</label>
                <select name="governorate_id" class="multisteps-form__select form-control">
                    @foreach($governorates as $governorate)
                        @php
                            $nameArray = json_decode($governorate->name, true);
                        @endphp
                        <option {{$city->governorate_id == $governorate->id ? 'selected= "selected" ' : ''}} value="{{ $governorate->id }}">{{ $nameArray['en']}}</option>
                    @endforeach
                </select>

                <div class="d-flex justify-content-end mt-4">
                    <a type="button"  href="{{ route('admin.city.index') }}" class="btn btn-light m-0">Cancel</a>
                    <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update City</button>
                </div>
            </form>
        </div>
    </div>
</div>
</
@endsection

@push('script')

@endpush
