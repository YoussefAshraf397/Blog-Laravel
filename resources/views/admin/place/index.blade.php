@extends('layouts.backend.app')

@section('title','Place')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="mb-0">Place List</h5>
                        <p class="text-sm mb-0">
                            This is the list of all places. You can add, edit or delete places from here.
                        </p>
                        <div class="ps-4">
                            <a href="{{ route('admin.place.create') }}" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#new-board-modal">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name[EN]</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name[AR]</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Property Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Week Days</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Week End</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Commission</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Group</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($places as $key=>$place)
                                <tr>
                                    <td>
                                        @if($place->status == \App\Enums\PlaceStatusEnum::ACTIVE)
                                            <span class="badge badge-success badge-sm">{{$place->status}}</span>
                                        @elseif($place->status == \App\Enums\PlaceStatusEnum::PENDING)
                                            <span class="badge badge-secondary badge-sm">{{$place->status}}</span>
                                        @elseif($place->status == \App\Enums\PlaceStatusEnum::UPDATE_PENDING)
                                            <span class="badge badge-dark badge-sm">{{$place->status}}</span>
                                        @elseif($place->status == \App\Enums\PlaceStatusEnum::SUSPENDED)
                                            <span class="badge badge-danger badge-sm">{{$place->status}}</span>
                                        @endif
                                    </td>

                                    @php
                                        $nameArray = json_decode($place->name, true);
                                    @endphp
                                    {{-- Access 'en' and 'ar' values --}}
                                    <td class="text-sm font-weight-normal">{{$nameArray['en']}}</td>
                                    <td class="text-sm font-weight-normal">{{$nameArray['ar']}}</td>

                                    <td class="text-sm font-weight-normal">{{\App\User::find($place->user_id)->name}}</td>

                                    <td class="text-sm font-weight-normal">
                                        {{json_decode(\App\Models\PropertyType::find($place->property_type_id)->name, true)['en']}}
                                    </td>
                                    <td class="text-sm font-weight-normal">
                                        {{json_decode(\App\Models\City::find($place->city_id)->name, true)['en']}}
                                    </td>

                                    <td class="text-sm font-weight-normal">{{$place->price_per_day_on_week_days}}</td>
                                    <td class="text-sm font-weight-normal">{{$place->price_per_day_on_week_end}}</td>

                                    <td class="text-sm font-weight-normal">{{$place->custom_commission}}</td>
                                    <td class="text-sm font-weight-normal">{{$place->category_group}}</td>

                                    <td >
                                        <div class="dropdown ">
                                            <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style="">
                                                <li><a  class="dropdown-item border-radius-md" href="{{ route('admin.place.edit',$place->id) }}" >
                                                        <i class="fas fa-edit"></i>    Update
                                                    </a></li>
                                                <li>
                                                    <button  class="dropdown-item border-radius-md" type="button"
                                                             onclick="deletePlace({{ $place->id }})">
                                                        <i class="fa fa-trash"></i> delete
                                                    </button>
                                                    <form id="delete-form-{{ $place->id }}"
                                                          action="{{ route('admin.place.destroy',$place->id) }}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deletePlace(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>


    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>
@endpush
