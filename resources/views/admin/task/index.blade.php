@extends('admin.layouts.master')

@section('title')
    Danh sách công việc
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            công việc
        @endslot
        @slot('title')
            Danh sách công việc
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Danh sách công việc</h4>

                    <form method="GET" action="{{ route('tasks.index') }}" class="row mb-2">
                        <div class="col-sm-3">
                            <div class="search-box mr-2 mb-2">
                                <div class="position-relative">
                                    <input type="text" name="search" class="form-control" placeholder="Nhập tiêu đề">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="bx bx-search-alt search-icon font-size-16 align-middle mr-2"></i> Tìm kiếm
                            </button>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-sm-end">
                                <a href="{{ route('users.create') }}"
                                    class="text-white btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i> Thêm công việc</a>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 70px;" class="text-center">STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Người thực hiện</th>
                                    <th>Nhãn dán</th>
                                    <th>Mức độ ưu tiên</th>
                                    <th>Tiến độ</th>
                                    <th>Thời gian dự kiến hoàn thành</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Phân công giảng dạy</td>
                                    <td>
                                        <span class="badge bg-primary">Nguyễn Đức Trung</span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #9f8fef;">Công việc đào tạo</span>
                                    </td>
                                    <td>Cao</td>
                                    <td>100%</td>
                                    <td>01/02/2024</td>
                                    <td>Đã hoàn thành</td>
                                    <td class="text-center">
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.show', 1) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="bx bx bx-detail text-success"></i></a>
                                            </li>
                                            {{-- @can('Chỉnh sửa công việc') --}}
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.edit', 1) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                            </li>
                                            {{-- @endcan --}}

                                            {{-- @can('Xóa công việc') --}}
                                            <li class="list-inline-item px">
                                                <form method="post" action="{{ route('tasks.destroy', 1) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Xóa" class="border-0 bg-white"><i class="mdi mdi-trash-can text-danger"></i></button>
                                                </form>
                                            </li>
                                            {{-- @endcan --}}
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Nhập điểm lên hệ thống</td>
                                    <td>
                                        <span class="badge bg-primary">Nguyễn Văn Đức</span>
                                        <span class="badge bg-primary">Đỗ Ánh Dương</span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #f5cd47;">Công việc khoa</span>
                                    </td>
                                    <td>Cao</td>
                                    <td>10%</td>
                                    <td>15/06/2024</td>
                                    <td>Đang làm</td>
                                    <td class="text-center">
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.show', 1) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="bx bx bx-detail text-success"></i></a>
                                            </li>
                                            {{-- @can('Chỉnh sửa công việc') --}}
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.edit', 1) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                            </li>
                                            {{-- @endcan --}}

                                            {{-- @can('Xóa công việc') --}}
                                            <li class="list-inline-item px">
                                                <form method="post" action="{{ route('tasks.destroy', 1) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Xóa" class="border-0 bg-white"><i class="mdi mdi-trash-can text-danger"></i></button>
                                                </form>
                                            </li>
                                            {{-- @endcan --}}
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Kiểm tra điện phòng A12</td>
                                    <td>
                                        <span class="badge bg-primary">Nguyễn Đình Nam</span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #94c748;">Công việc quản lý</span>
                                    </td>
                                    <td>Cao</td>
                                    <td>0%</td>
                                    <td>22/05/2024</td>
                                    <td>Đã huỷ</td>
                                    <td class="text-center">
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.show', 1) }}" data-toggle="tooltip" data-placement="top" title="Xem chi tiết"><i class="bx bx bx-detail text-success"></i></a>
                                            </li>
                                            {{-- @can('Chỉnh sửa công việc') --}}
                                            <li class="list-inline-item px">
                                                <a href="{{ route('tasks.edit', 1) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                            </li>
                                            {{-- @endcan --}}

                                            {{-- @can('Xóa công việc') --}}
                                            <li class="list-inline-item px">
                                                <form method="post" action="{{ route('tasks.destroy', 1) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Xóa" class="border-0 bg-white"><i class="mdi mdi-trash-can text-danger"></i></button>
                                                </form>
                                            </li>
                                            {{-- @endcan --}}
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
