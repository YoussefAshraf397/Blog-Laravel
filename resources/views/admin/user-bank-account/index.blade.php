@extends('layouts.backend.app')

@section('title','User Bank Account')

@push('css')

@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">User Bank Accounts List</h5>
                    <p class="text-sm mb-0">
                        This is the list of all user bank accounts. You can add, edit or delete user bank accounts from here.
                    </p>
                    <div class="ps-4">
                        <a href="{{ route('admin.user-bank-account.create') }}" class="btn bg-gradient-info btn-icon-only mb-0 mt-3" data-toggle="modal" data-target="#new-board-modal">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bank</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Branch Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Swift Code</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Account Number</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IBAN</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Front Media</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Back Media</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userBankAccounts as $key=>$userBankAccount)
                            @php
                                $bankArray = json_decode($userBankAccount->bank->name, true);
                            @endphp
                        <tr>
                            <td class="text-sm font-weight-normal">{{$userBankAccount->user->name}}</td>
                            <td class="text-sm font-weight-normal">{{$bankArray['en']}}</td>
                            <td class="text-sm font-weight-normal">{{$userBankAccount->account_name}}</td>
                            <td class="text-sm font-weight-normal">{{$userBankAccount->branch_name}}</td>

                            <td class="text-sm font-weight-normal">{{$userBankAccount->swift_code}}</td>
                            <td class="text-sm font-weight-normal">{{$userBankAccount->account_number}}</td>
                            <td class="text-sm font-weight-normal">{{$userBankAccount->iban}}</td>
                            <td class="text-sm font-weight-normal">
                                <div>
                                    <img src="{{URL::to('/')}}{{'/user-bank-account/'.$userBankAccount->front_media}}" class="avatar avatar-sm me-3" alt="avatar image">
                                </div>
                            </td>
                            <td class="text-sm font-weight-normal">
                                <div>
                                    <img src="{{URL::to('/')}}{{'/user-bank-account/'.$userBankAccount->back_media}}" class="avatar avatar-sm me-3" alt="avatar image">
                                </div>
                            </td>
                            <td>
                                <div class="dropdown ">
                                    <a href="javascript:;" class="cursor-pointer" id="dropdownTable2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-secondary" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable2" style="">
                                        <li><a  class="dropdown-item border-radius-md" href="{{ route('admin.user-bank-account.edit',$userBankAccount->id) }}" >
                                                <i class="fas fa-edit"></i>    Update
                                            </a></li>
                                        <li>
                                            <button  class="dropdown-item border-radius-md" type="button"
                                                     onclick="deleteBank({{ $userBankAccount->id }})">
                                                <i class="fa fa-trash"></i> delete


                                            </button>
                                            <form id="delete-form-{{ $userBankAccount->id }}"
                                                  action="{{ route('admin.user-bank-account.destroy',$userBankAccount->id) }}"
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
        function deleteBank(id) {
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
