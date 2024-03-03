@extends('layouts.backend.app')

@section('title','System Configuration')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <div class="card card-body mt-4">
                    <form action="{{ route('admin.system-configuration.update',$setting->id) }}" method="POST"
                          enctype="multipart/form-data" id = 'identifier'>
                        @csrf
                        @method('PUT')

                        @php
                            $settingsArray = json_decode($setting->settings, true);
                        @endphp
                        <h6 class="mb-0">Edit Policy</h6>
                        <p class="text-sm mb-0">Edit the system configuration</p>
                        <hr class="horizontal dark my-3">

                        <label>Name</label>
                        <input name="name" class="multisteps-form__input form-control" type="text" value="{{$setting->name}}" />


                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label>Whatsapp</label>
                                <input name="whatsapp" class="multisteps-form__input form-control" type="text" value="{{$settingsArray['whatsapp']}}" />
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label>Currency</label>
                                <input name="currency" class="multisteps-form__input form-control" type="text" value="{{$settingsArray['currency']}}" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a type="button"  href="{{ route('admin.system-configuration.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update System Configuration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        //description
        if (document.getElementById('editor-ar')) {
            var quill = new Quill('#editor-ar', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        if (document.getElementById('editor-en')) {
            var quill = new Quill('#editor-en', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        $("#identifier").on("submit",function() {
            //description
            $("#text_description_ar").val($("#editor-ar .ql-editor").html());
            $("#text_description_en").val($("#editor-en .ql-editor").html());
        });
    </script>
@endpush
