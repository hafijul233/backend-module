@extends('layouts.app')

@section('title', 'Users')

@section('keywords', 'Register, sing up')

@section('description', 'user tries to login in to system')

@push('component-styles')

@endpush

@push('page-styles')

@endpush

@section('breadcrumbs', Breadcrumbs::render(Route::getCurrentRoute()->getName()))

@section('options')
    {!! \Html::linkButton('Add User', 'users.create', [], 'mdi mdi-plus', 'success') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! Html::cardHeader('Users',
                        'mdi mdi-account-group-outline',
                         'DataTables has most features enabled by default.') !!}
                <div class="card-body">

                    {!! \Form::open(['route' => 'users.index', 'method' => 'get']) !!}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                {!! \Form::search('search', old('search', (request()->get('search') ?? null)),
                                    ['class' => 'form-control', 'placeholder' =>'Search Name, Role, Email, Mobile.. etc',
                                     'aria-label' => 'Search Name, Role, Email, Mobile.. etc',
                                      'aria-describedby' => 'Search Name, Role, Email, Mobile.. etc',
                                     'id' => 'search']) !!}
                                <div class="input-group-append">
                                    {!! \Form::submit('Search', ['class' => 'btn btn-primary input-group-right-btn']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! \Form::close() !!}

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-display">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('email', 'Email')</th>
                                <th>@sortablelink('mobile', 'Mobile')</th>
                                <th>@sortablelink('role', 'Role(s)')</th>
                                <th class="text-center">@sortablelink('enabled', 'Enabled')</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $loop->index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">{{ $user->mobile }}</td>
                                    <td class="text-left">
                                        <ul>
                                            @forelse($user->roles as $role)
                                                <li>{{ $role->name }}</li>
                                            @empty
                                                <li>No Role(s) Assigned</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" data-toggle="toggle" data-size="small"
                                               data-onstyle="{{ $on ?? 'success' }}"
                                               data-offstyle="{{ $off ?? 'danger' }}"
                                               data-model=""
                                               data-field="enabled"
                                               data-id="{{$user->id}}"
                                               data-on="<i class='mdi mdi-check-bold fw-bolder'></i> Yes"
                                               data-off="<i class='mdi mdi-close fw-bolder'></i> No"
                                               @if($user->enabled == 'yes') checked @endif>
                                    </td>
                                    <td>
                                        {!! \Html::actionButton('users', $user->id, ['show', 'edit', 'delete']) !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No data to display</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $users->onEachSide(2)->appends(request()->query())->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('component-scripts')

@endpush


@push('page-scripts')

@endpush
