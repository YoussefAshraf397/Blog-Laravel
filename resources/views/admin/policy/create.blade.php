@extends('layouts.backend.app')

@section('title','Policy')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">

            <div class="card card-body mt-4">
                <form action="{{ route('admin.policy.store') }}" method="POST" enctype="multipart/form-data" id="identifier">
                    @csrf
                    <h6 class="mb-0">New Policy</h6>
                    <p class="text-sm mb-0">Create new policy</p>
                    <hr class="horizontal dark my-3">
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Title EN</label>
                            <input name="title_en" class="multisteps-form__input form-control" type="text" placeholder="..." />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>Title AR</label>
                            <input name="title_ar" class="multisteps-form__input form-control" type="text" placeholder="..." />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="mt-4">Description[EN]</label>
                            <div id="editor-en" class="h-50">
                            </div>
                            <textarea name="description_en" style="display:none" id="text_description_en"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label class="mt-4">Description[AR]</label>
                            <div id="editor-ar" class="h-50">
                            </div>
                            <textarea name="description_ar" style="display:none" id="text_description_ar"></textarea>
                        </div>
                    </div>
                    <br>

                    <label>Type</label>
                    <select name="type" class="multisteps-form__select form-control">
                        <option selected="selected">...</option>
                        @foreach($feedTypes as $feedType)
                            <option value="{{ $feedType }}">{{ $feedType }}</option>
                        @endforeach
                    </select>

                    <div class="d-flex justify-content-end mt-4">
                        <a type="button"  href="{{ route('admin.policy.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create Policy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        if (document.getElementById('editor-ar')) {
            var quill = new Quill('#editor-ar', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        $("#identifier").on("submit",function() {
            $("#text_description_ar").val($("#editor-ar .ql-editor").html());
            $("#text_description_en").val($("#editor-en .ql-editor").html());
        });

        if (document.getElementById('editor-en')) {
            var quill = new Quill('#editor-en', {
                theme: 'snow' // Specify theme in configuration
            });
        }
    </script>
@endpush
