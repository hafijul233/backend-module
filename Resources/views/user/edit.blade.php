@extends('layouts.app')

@section('title', 'Edit User')

@section('keywords', 'Register, sing up')

@section('description', 'user tries to login in to system')

@push('component-styles')

@endpush

@push('page-styles')

@endpush

@section('breadcrumbs', Breadcrumbs::render(Route::getCurrentRoute()->getName(), $user))

@section('options')
    {!! \Html::backButton('users.index') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! Html::cardHeader('Edit User',
                        'mdi mdi-account-group-outline',
                         'DataTables has most features enabled by default.') !!}
                {!! \Form::open(['route' => ['users.update', $user->id],'files' => true, 'id' => 'user-form', 'method'=>"put"]) !!}
                @include('backend.preference.user.form')
                {!! \Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('component-scripts')

@endpush


@push('page-scripts')
@endpush
