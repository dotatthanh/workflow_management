@extends('admin.layouts.master')

@section('title')
    Cập nhật công việc
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Công việc
        @endslot
        @slot('title')
            Cập nhật công việc
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Cập nhật công việc</h4>
                    <form class="outer-repeater" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">Tiêu đề</label>
                                    <div class="col-lg-10">
                                        <input id="taskname" name="taskname" type="text" class="form-control"
                                            placeholder="Nhập tiêu đề ...">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">Người thực hiện</label>
                                    <div class="col-lg-10">
                                        <select name="users[]" id="users" class="select2 select2-multiple form-control"
                                            multiple data-placeholder="Chọn thực hiện ...">
                                            <option value="1">Nam</option>
                                            <option value="2">Thành</option>
                                            <option value="3">Thắng</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">Nhãn dán</label>
                                    <div class="col-lg-10">
                                        <select name="labels[]" id="addRole" class="select2 select2-multiple form-control"
                                            multiple data-placeholder="Chọn nhãn dán ...">
                                            <option value="1">Công việc khoa</option>
                                            <option value="2">Công việc lớp</option>
                                            <option value="3">Công việc tình nguyện</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Thời gian</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" placeholder="Ngày bắt đầu"
                                                name="start" />
                                            <input type="text" class="form-control" placeholder="Ngày kết thúc"
                                                name="end" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="priority" class="col-form-label col-lg-2">Mức độ ưu tiên</label>
                                    <div class="col-lg-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Thấp</option>
                                            <option value="">Bình thường</option>
                                            <option value="">Cao</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="progress" class="col-form-label col-lg-2">Tiến độ</label>
                                    <div class="col-lg-10">
                                        <input id="progress" name="progress" type="text" class="form-control"
                                            placeholder="Nhập tiến độ ...">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="estimated_time" class="col-form-label col-lg-2">Thời gian dự kiến hoàn
                                        thành</label>
                                    <div class="col-lg-10">
                                        <input id="estimated_time" name="estimated_time" type="text" class="form-control"
                                            placeholder="Nhập thời gian dự kiến hoàn thành ...">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Mô tả</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor" name="area"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="status" class="col-form-label col-lg-2">Trạng thái</label>
                                    <div class="col-lg-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="">Đang làm</option>
                                            <option value="">Đã hoàn thành</option>
                                            <option value="">Đã huỷ</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Cập nhật công việc</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- Summernote js -->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- form repeater js -->
    <script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-create.init.js') }}"></script>

    <!-- select 2 plugin -->
    <script src="{{ asset('assets\libs\select2\select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets\js\pages\ecommerce-select2.init.js') }}"></script>
@endsection

@section('css')
    <!-- datepicker css -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- select2 css -->
    <link href="{{ asset('assets\libs\select2\select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
