@extends('layouts.backend.app')

@section('title','Admin User')

@push('css')

@endpush

@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{URL::to('/')}}{{'/user/'.$user->profile_image}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$user->name}}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{$user->type}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a type="button" class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "  href="{{ route('admin.admin-user.index') }}" aria-selected="true">
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
        <div class="row mt-3">
            <div>
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Roles</h6>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Mange user roles</h6>
                        <div class="d-flex justify-content-center mt-4">
                            @if ($user->roles)
                            @php $count = 0; @endphp <!-- Initialize a counter -->
                            @foreach ($user->roles as $user_role)
                                    <form  method="POST"
                                          action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                           <button class ="btn bg-gradient-info m-0 ms-2" type="submit">{{ $user_role->name }}</button>
                                    </form>
                                    @php $count++; @endphp <!-- Increment the counter -->
                                    @if ($count % 4 == 0) <!-- After every 4th item -->
                                    <div class="w-100"></div> <!-- This creates a break to the new line -->
                                    @endif
                                @endforeach
                            @endif
                        </div>

                            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label class="mt-4">Roles</label>
                                    <select name="role" class="multisteps-form__select form-control">
                                        <option selected="selected">...</option>
                                    @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit"
                                    class="btn bg-gradient-info btn-icon-only mb-0 mt-3">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div>
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Permission</h6>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Mange user permissions</h6>
                        <div class="d-flex flex-wrap justify-content-center mt-4">
                            @if ($user->permissions)
                                @php $count = 0; @endphp <!-- Initialize a counter -->
                                @foreach ($user->permissions as $user_permission)
                                    <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn bg-gradient-info m-0 ms-2 mb-2" type="submit">{{ $user_permission->name }}</button>
                                    </form>

                                    @php $count++; @endphp <!-- Increment the counter -->
                                    @if ($count % 4 == 0) <!-- After every 4th item -->
                                    <div class="w-100"></div> <!-- This creates a break to the new line -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label class="mt-4">Permission</label>
                                    <select name="permission" class="multisteps-form__select form-control">
                                        <option selected="selected">...</option>
                                    @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit"
                                    class="btn bg-gradient-info btn-icon-only mb-0 mt-3">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
@endpush
