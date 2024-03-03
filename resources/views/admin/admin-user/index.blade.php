@extends('layouts.backend.app')

@section('title','Admin User')

@push('css')

@endpush

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="mb-0">Admin Users List</h5>
                        <p class="text-sm mb-0">
                            This is the list of all admin users. You can add, edit or delete admin users from here.
                        </p>
                        <div class="ps-4">
                            <a href="{{ route('admin.admin-user.create') }}" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#new-board-modal">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profile Image</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Country Code</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Country</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                @php
                                    $countryName = json_decode($user->country->name, true);
                                @endphp
                                <tr>
                                    <td class="text-sm font-weight-normal">
                                        <div>
                                            <img src="{{URL::to('/')}}{{'/user/'.$user->profile_image}}" class="avatar avatar-sm me-3" alt="avatar image">
                                        </div>
                                    </td>
                                    <td class="text-sm font-weight-normal">{{$user->name}}</td>
                                    <td class="text-sm font-weight-normal">{{$user->email}}</td>
                                    <td class="text-sm font-weight-normal">{{$user->country_code}}</td>
                                    <td class="text-sm font-weight-normal">{{$user->status}}</td>
                                    <td class="text-sm font-weight-normal">{{$user->type}}</td>
                                    <td class="text-sm font-weight-normal">{{$countryName['en']}}</td>

                                    <td >
                                        <div class="dropdown ">
                                            <a href="javascript:" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style="">
                                                <li><a  class="dropdown-item border-radius-md" href="{{ route('admin.admin-user.edit',$user->id) }}" >
                                                        <i class="fas fa-edit"></i>    Update
                                                    </a>
                                                </li>
                                                <li><a  class="dropdown-item border-radius-md" href="{{ route('admin.admin-user.show',$user->id) }}" >
                                                        <i class="fas fa-eye"></i>    Mange Roles And Permissions
                                                    </a>
                                                </li>
                                                <li>
                                                    <button  class="dropdown-item border-radius-md" type="button"
                                                             onclick="deleteAdminUser({{ $user->id }})">
                                                        <i class="fa fa-trash"></i> delete
                                                    </button>
                                                    <form id="delete-form-{{ $user->id }}"
                                                          action="{{ route('admin.admin-user.destroy',$user->id) }}"
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
        function deleteAdminUser(id) {
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
