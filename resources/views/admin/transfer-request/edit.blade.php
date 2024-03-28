@extends('layouts.backend.app')

@section('title','Tranfer Request')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-9 col-12 mx-auto">

                <div class="card card-body mt-4">
                    <form action="{{ route('admin.transfer-request.update',$transferRequest->id) }}" method="POST"
                          enctype="multipart/form-data" id = 'identifier'>
                        @csrf
                        @method('PUT')

                        <h6 class="mb-0">Edit Transfer Request</h6>
                        <p class="text-sm mb-0">Edit Transfer Request</p>
                        <hr class="horizontal dark my-3">

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label>Payment Transaction Number</label>
                                <input name="payment_transaction_number" class="multisteps-form__input form-control" type="text" value="{{$transferRequest->payment_transaction_number}}" />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label>Status</label>
                                <select name="status" class="multisteps-form__select form-control">
                                    @foreach($transferRequestStatus as $status)
                                        <option {{$status == $transferRequest->status ? 'selected="selected"' : ''}} value="{{$status}}">{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label class="mt-4">Notes</label>
                        <div id="editor-en">
                            {!! $transferRequest->notes  !!}
                        </div>
                        <textarea name="notes" style="display:none" id="text_notes" ></textarea>




                        <div class="d-flex justify-content-end mt-4">
                            <a type="button"  href="{{ route('admin.transfer-request.index') }}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2">Update Transfer Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        if (document.getElementById('editor-en')) {
            var quill = new Quill('#editor-en', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        $("#identifier").on("submit",function() {
            $("#text_notes").val($("#editor-en .ql-editor").html());
        });
    </script>
@endpush
