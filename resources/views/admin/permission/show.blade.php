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

                    <form method="POST" action="{{ route('permissions.update', $role->id) }}" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf
                        <div class="row">
                            @foreach ($permissions as $permission)
                            <div class="col-sm-4">
                                <div class="custom-control custom-checkbox custom-checkbox-info mb-3">
                                    <input disabled name="permissions[{{ $permission->id }}]" type="checkbox" class="custom-control-input" id="customCheckcolor{{ $permission->id }}" {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheckcolor{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

