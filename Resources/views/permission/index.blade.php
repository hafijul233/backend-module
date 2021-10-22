@extends('backend::layouts.backend')

@section('title', 'Register')

@push('meta')

@endpush

@push('webfont')

@endpush

@push('icon')

@endpush

@push('plugin-style')

@endpush

@push('inline-style')

@endpush

@push('head-script')

@endpush

@section('body-class', 'sidebar-mini')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <h5 class="mb-0">Online Documentation</h5>
        <ol class="breadcrumb bg-transparent p-0 mb-0">
            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Documentation</li>
        </ol>
    </nav>
@endsection

@section('actions')
    <a class="btn btn-dark" href="https://github.com/htmlstreamofficial/stream-dashboard-ui-kit">
        <i class="fab fa-github mr-1"></i> Github
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            {!! \Html::cardHeader(__('backend::general.preference.permissions.index.title'),
                    __('backend::general.preference.permissions.icon'),
                     __('backend::general.preference.permissions.index.detail')) !!}
            <div class="card-body">

                {!! \Form::open(['route' => 'permissions.index', 'method' => 'get']) !!}
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            {!! \Form::search('search', old('search', (request()->get('search') ?? null)),
                                ['class' => 'form-control', 'placeholder' =>'Search Permission Name, Guard, Enabled.. etc',
                                 'aria-label' => 'Search Permission Name', 'aria-describedby' => 'Search Permission Name',
                                 'id' =>'search']) !!}
                            <div class="input-group-append">
                                {!! \Form::submit('Search', ['class' => 'btn btn-primary input-group-right-btn']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! \Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-display" id="permission-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('display_name', 'Name')</th>
                            <th>@sortablelink('name', 'Code')</th>
                            <th>@sortablelink('guard_name', 'Guard')</th>
                            <th class="text-center">@sortablelink('enabled', 'Enabled')</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($permissions as $index => $permission)
                            <tr>
                                <td class="exclude-search">{{ $permissions->firstItem() + $loop->index }}</td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td class="text-center exclude-search">
                                    <input type="checkbox" data-toggle="toggle" data-size="small"
                                           data-onstyle="{{ $on ?? 'success' }}"
                                           data-offstyle="{{ $off ?? 'danger' }}"
                                           data-model=""
                                           data-field="enabled"
                                           data-id="{{$permission->id}}"
                                           data-on="<i class='mdi mdi-check-bold fw-bolder'></i> Yes"
                                           data-off="<i class='mdi mdi-close fw-bolder'></i> No"
                                           @if($permission->enabled == 'yes') checked @endif>

                                    {{--{!! \CHTML::flagChangeButton($permission, 'enabled', ['yes', 'no']) !!}--}}
                                </td>
                                <td class="exclude-search">
                                    {!! \Html::actionButton('permissions', $permission->id, ['show', 'edit', 'delete']) !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="exclude-search">No data to display</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {!! \Modules\Backend\Supports\CHTML::pagination($permissions) !!}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


@push('plugin-script')

@endpush

@push('page-script')

@endpush
