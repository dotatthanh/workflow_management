@extends('admin.layouts.master')

@section('title')
    Xem quyền
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Quyền
        @endslot
        @slot('title')
            Xem quyền
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Danh sách quyền</h4>
                    <p class="card-title-desc">Chọn quyền cho vai trò</p>

                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            @foreach ($permissions as $permission)
                                @if ($loop->iteration == 1)
                                    <h5>Quản tài khoản</h5>
                                @endif

                                <div class="custom-control custom-checkbox custom-checkbox-info mb-3">
                                    <input disabled name="permissions[{{ $permission->id }}]" type="checkbox" class="custom-control-input" id="customCheckcolor{{ $permission->id }}" {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheckcolor{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>

                                @if ($loop->iteration == 4)
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <h5>Quản lý nhãn dán</h5>
                                @endif

                                @if ($loop->iteration == 8)
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <h5>Quản lý công việc</h5>
                                @endif

                                @if ($loop->iteration == 13)
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <h5>Quản lý vai trò</h5>
                                @endif

                                @if ($loop->iteration == 17)
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <h5>Quản lý quyền</h5>
                                @endif
                            @endforeach

                        </div>
                    </div>

                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>

                </div>
            </div>
        </div>
    </div>
@endsection

