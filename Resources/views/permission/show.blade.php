@extends('layouts.app')

@section('title', ucwords(str_replace(['.', '-'], [' ', ' '], $permission->name)))

@section('keywords', 'Register, sing up')

@section('description', 'user tries to login in to system')

@push('component-styles')

@endpush

@push('page-styles')

@endpush

@section('breadcrumbs', \Breadcrumbs::render(\Route::getCurrentRoute()->getName(), $permission->toArray()))

@section('options')
    {!! \Html::backButton('permissions.index') !!}
    {!! \Html::editButton('permissions.edit', $permission->id) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! Html::cardHeader(__('general.preference.permissions.show.title'),
                        __('general.preference.permissions.icon'),
                         __('general.preference.permissions.show.detail')) !!}
                <div class="card-body min-vh-100">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="d-block">Display Name</label>
                            <p class="fw-bolder">{{ $permission->display_name ?? null }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="d-block">Name</label>
                            <p class="fw-bolder">{{ $permission->name ?? null }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="d-block">Guard(s)</label>
                            <p class="fw-bolder">{{ $permission->guard_name ?? null }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="d-block">Enabled</label>
                            <p class="fw-bolder">{{ \Constant::ENABLED_OPTIONS[$permission->enabled] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="d-block">Remarks</label>
                            <p class="fw-bolder">{{ $permission->remarks ?? null }}</p>
                        </div>
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
