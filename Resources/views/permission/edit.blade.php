@extends('layouts.app')

@section('title', 'Edit Permission')

@section('keywords', 'Register, sing up')

@section('description', 'user tries to login in to system')

@push('component-styles')

@endpush

@push('page-styles')

@endpush
{{--

@section('breadcrumbs', Breadcrumbs::render(Route::getCurrentRoute()->getName(), $permission))
--}}

@section('options')
    {!! \Html::backButton('permissions.index') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! Html::cardHeader(__('general.preference.permissions.edit.title'),
        __('general.preference.permissions.icon'),
         __('general.preference.permissions.edit.detail')) !!}
                {!! \Form::open(['route' => ['permissions.update', $permission->id], 'method' => 'put', 'id' => 'permission-form']) !!}
                @include('backend.preference.permission.form')
                {!! \Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('component-scripts')

@endpush


@push('page-scripts')
@endpush
