@extends('layouts.backend.app')

@section('title','City')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="mb-0">City List</h5>
                        <p class="text-sm mb-0">
                            This is the list of all cities. You can add, edit or delete cities from here.
                        </p>
                        <div class="ps-4">
                            <a href="{{ route('admin.city.create') }}" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#new-board-modal">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name_Soundex</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name[EN]</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name[AR]</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Governorate</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $key=>$city)
                                <tr>
                                    <td class="text-sm font-weight-normal">{{$key+1}}</td>
                                    <td class="text-sm font-weight-normal">{{$city->name_soundex}}</td>
                                    @php
                                        $nameArray = json_decode($city->name, true);
                                        $governorateName = json_decode($city->governorate->name, true);

                                    @endphp
                                    {{-- Access 'en' and 'ar' values --}}
                                    <td class="text-sm font-weight-normal">{{$nameArray['en']}}</td>
                                    <td class="text-sm font-weight-normal">{{$nameArray['ar']}}</td>
                                    <td class="text-sm font-weight-normal">{{$governorateName['en']}}</td>
                                    <td class="text-sm font-weight-normal">{{$city->created_at}}</td>
                                    <td >
                                        <div class="dropdown ">
                                            <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style="">
                                                <li><a  class="dropdown-item border-radius-md" href="{{ route('admin.city.edit',$city->id) }}" >
                                                        <i class="fas fa-edit"></i>    Update
                                                    </a></li>
                                                <li>
                                                    <button  class="dropdown-item border-radius-md" type="button"
                                                             onclick="deleteCity({{ $city->id }})">
                                                        <i class="fa fa-trash"></i> delete
                                                    </button>
                                                    <form id="delete-form-{{ $city->id }}"
                                                          action="{{ route('admin.city.destroy',$city->id) }}"
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
        function deleteCity(id) {
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