@extends('layouts.backend.app')

@section('title','Place')

@push('css')

@endpush

@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom" style="margin-top: 5rem;">
        <div class="card-body p-4">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img  src="{{ asset('assets/backend/img/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Sky Dance Hosting
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Admin
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a type="button" class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "  href="{{ route('admin.place.index') }}" aria-selected="true">
                                    <i class="fa fa-times"></i>
                                    <span class="ms-2">Cancel</span>
                                </a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="fa fa-comment"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="multisteps-form">
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Place Info">
                                    <span>1. Place Info</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Place Relation">2. Place Relation</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Place Requirement">3. Place Requirement</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Pricing">4. Place Pricing</button>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <form class="multisteps-form__form mb-8" action="{{ route('admin.place.store') }}" method="POST" enctype="multipart/form-data" id="identifier">
                                @csrf
                                <!--single form panel place info-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Place Information</h5>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <label>Name[EN]</label>
                                                <input name="name_en" class="multisteps-form__input form-control" type="text" placeholder="..." />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <label>Name[AR]</label>
                                                <input name="name_ar" class="multisteps-form__input form-control" type="text" placeholder="..." />
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
                                            <div class="col-sm-6">
                                                <label class="mt-4">Cancellation Policy[EN]</label>
                                                <div id="cancellation-policy-en" class="h-50">
                                                </div>
                                                <textarea name="cancellation_policy_en" style="display:none" id="text_cancellation_policy_en"></textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="mt-4">Cancellation Policy[AR]</label>
                                                <div id="cancellation-policy-ar" class="h-50">
                                                </div>
                                                <textarea name="cancellation_policy_ar" style="display:none" id="text_cancellation_policy_ar"></textarea>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-info ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <!--single form panel place relation-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Place Relation</h5>
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Status</label>
                                                <select name="status" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    @foreach($placeStatus as $status)
                                                        <option value="{{$status}}">{{$status}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Category Group</label>
                                                <select name="category_group" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Place Type</label>
                                                <select name="place_type_id" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    @foreach($placeTypes as $placeType)
                                                        <option value="{{$placeType->id}}">{{json_decode($placeType->name, true)['en']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Property Type</label>
                                                <select name="property_type_id" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    @foreach($propertyTypes as $propertyType)
                                                        <option value="{{$propertyType->id}}">{{json_decode($propertyType->name, true)['en']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>City</label>
                                                <select name="city_id" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{json_decode($city->name, true)['en']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>User</label>
                                                <select name="user_id" class="multisteps-form__select form-control">
                                                    <option selected="selected">...</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-info ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--single form panel place requirement-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Place Requirements</h5>
                                    <div class="multisteps-form__content">

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="requires_professional_photographer" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Requires Professional Photographer</span>
                                                <span class="text-xs d-block">I want to professional photographer.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="accepts_reservations_automatically" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Is Instance Booking?</span>
                                                <span class="text-xs d-block">I want make place instance booking.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="is_active" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Is Active?</span>
                                                <span class="text-xs d-block">I want to make place is active.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="accepts_promocodes" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Accepts Promo Codes</span>
                                                <span class="text-xs d-block">I want to accept promo codes.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="support_overnight" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Support Overnight</span>
                                                <span class="text-xs d-block">The place supports overnight.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="can_use_additional_services" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">User Can use additional services</span>
                                                <span class="text-xs d-block">The place has additional service.</span>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                                            <div>
                                                <div class="form-check form-switch mb-0">
                                                    <input name="is_accepting_additional_service" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                                </div>
                                            </div>
                                            <div class="ms-2">
                                                <span class="text-dark font-weight-bold d-block text-sm">Place accepting additional services</span>
                                                <span class="text-xs d-block">The place is accepting additional services.</span>
                                            </div>
                                        </div>
                                        <br>



                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn bg-gradient-info ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--single form place pricing-->
                                <div class="card multisteps-form__panel p-3 border-radius-xl bg-white " data-animation="FadeIn">
                                    <h5 class="font-weight-bolder">Place Pricing</h5>
                                    <div class="multisteps-form__content mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Price Per Day On Week Days</label>
                                                <input name="price_per_day_on_week_days" class="multisteps-form__input form-control" type="text" placeholder="99.00" />
                                            </div>
                                            <div class="col-6">
                                                <label>Price Per Day On Week End</label>
                                                <input name="price_per_day_on_week_end" class="multisteps-form__input form-control" type="text" placeholder="99.00" />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Custom Commission</label>
                                                <input name="custom_commission" class="multisteps-form__input form-control" type="text" placeholder="99.00" />
                                            </div>

                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                                            <button class="btn bg-gradient-info ms-auto mb-0" type="submit" title="Send">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

        //cancellation plolicy
        if (document.getElementById('cancellation-policy-ar')) {
            var quill = new Quill('#cancellation-policy-ar', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        if (document.getElementById('cancellation-policy-en')) {
            var quill = new Quill('#cancellation-policy-en', {
                theme: 'snow' // Specify theme in configuration
            });
        }

        $("#identifier").on("submit",function() {
            //description
            $("#text_description_ar").val($("#editor-ar .ql-editor").html());
            $("#text_description_en").val($("#editor-en .ql-editor").html());

            //cancellation policy
            $("#text_cancellation_policy_ar").val($("#cancellation-policy-ar .ql-editor").html());
            $("#text_cancellation_policy_en").val($("#cancellation-policy-en .ql-editor").html());
        });
    </script>
@endpush

