@extends('layouts.app')

@section('title', $user->name)

@section('keywords', 'Register, sing up')

@section('description', 'user tries to login in to system')

@push('component-styles')

@endpush

@push('page-styles')

@endpush

@section('breadcrumbs', \Breadcrumbs::render(\Route::getCurrentRoute()->getName(), $user))

@section('options')
    {!! \Html::backButton('users.index') !!}
    {!! \Html::editButton('users.edit', $user->id) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! Html::cardHeader('User Details',
                        'mdi mdi-account-group-outline',
                         'DataTables has most features enabled by default.') !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Name</label>
                                        <p class="fw-bolder">{{ $user->name ?? null }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Username</label>
                                        <p class="fw-bolder">{{ $user->username ?? null }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Email</label>
                                        <p class="fw-bolder">{{ $user->email ?? null }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Mobile Number</label>
                                        <p class="fw-bolder">{{ $user->mobile ?? null }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img
                                src="{{ ($user->getFirstMedia('avatars') !== null) ? $user->getFirstMedia('avatars')->getUrl() : ''}}"
                                class="img-fluid img-thumbnail card-img">
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom my-3">
                            <div class="card-title d-flex justify-content-between">
                                <h4 class="mb-0">
                                    <i class="mdi mdi-account-check-outline"></i>
                                    Roles
                                </h4>
                            </div>
                            <p class="card-title-desc mb-3">
                                Roles assigned to this User.
                            </p>
                        </div>
                        <div class="col-12">
                            @forelse($user->roles as $role)
                                <span class="{{ \Helper::randomBadge(1) }} p-2 font-size-16">
                                        <i class="mdi mdi-account-child-circle m-1"></i>
                                    {{ $role->name }}
                                </span>
                            @empty
                                <div class="col-12 text-center fw-bolder">This User Don't have any
                                    Assigned Role
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom my-3">
                            <div class="card-title d-flex justify-content-between">
                                <h4 class="mb-0">
                                    <i class="mdi mdi-account-details-outline"></i>
                                    Permissions
                                </h4>
                            </div>
                            <p class="card-title-desc mb-3">
                                Permission /Privilege assigned to this Role.
                            </p>
                        </div>
                        @forelse($user->roles as $role)
                            @forelse($role->permissions as $permission)
                                <div class="col-md-3">
                                    <p class="text-dark fw-bold" title="{{ $permission->name }}">
                                        <i class="mdi mdi-account-key m-2"></i> {{ $permission->display_name }}
                                    </p>
                                </div>
                            @empty
                                <div class="col-12 text-center fw-bolder">This Role Don't have any Permission/Privileges
                                </div>
                            @endforelse
                        @empty
                            <div class="col-12 text-center">No Role(s) Assigned</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('component-scripts')

@endpush


@push('page-scripts')
@endpush
