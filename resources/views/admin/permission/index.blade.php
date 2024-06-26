@extends('admin.layouts.master')

@section('title')
    Danh sách vai trò
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Quyền
        @endslot
        @slot('title')
            Danh sách vai trò
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('permissions.index') }}">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <div class="search-box mr-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" name="search" class="form-control" placeholder="Nhập vai trò">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    <i class="bx bx-search-alt search-icon font-size-16 align-middle mr-2"></i> Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 70px;" class="text-center">STT</th>
                                    <th>Tên vai trò</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php ($stt = 1)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">{{ $stt++ }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="text-center">
                                            @if ($role->id != 1)
                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                @can('Xem quyền')
                                                <li class="list-inline-item px">
                                                    <a href="{{ route('permissions.show', $role->id) }}" data-toggle="tooltip" data-placement="top" title="Xem"><i class="fa fa-eye text-success"></i></a>
                                                </li>
                                                @endcan

                                                @can('Chỉnh sửa quyền')
                                                <li class="list-inline-item px">
                                                    <a href="{{ route('permissions.edit', $role->id) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                                </li>
                                                @endcan
                                            </ul>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
