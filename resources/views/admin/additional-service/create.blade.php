@extends('layouts.backend.app')

@section('title','Additional Service')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">

            <div class="card card-body mt-4">
                <form action="{{ route('admin.additional-service.store') }}" method="POST" enctype="multipart/form-data" id="identifier">
                    @csrf
                    <h6 class="mb-0">New Additional Service</h6>
                    <p class="text-sm mb-0">Create new additional service type</p>
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

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label>Unit EN</label>
                            <input name="unit_en" class="multisteps-form__input form-control" type="text" placeholder="..." />
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                            <label>Unit AR</label>
                            <input name="unit_ar" class="multisteps-form__input form-control" type="text" placeholder="..." />
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

                    <div class="row">
                        <label class="mt-4 form-label">Icon image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="icon" lang="en">
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a type="button"  href="{{ route('admin.property-type.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button  type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Create additonal service</button>
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

