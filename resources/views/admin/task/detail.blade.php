@extends('admin.layouts.master')

@section('title')
    Chi tiết công việc
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            Công việc
        @endslot
        @slot('title')
            Chi tiết công việc
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Chi tiết công việc</h4>
                    <form class="outer-repeater" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">Tiêu đề</label>
                                    <div class="col-lg-10">
                                        <input id="taskname" name="taskname" type="text" class="form-control"
                                            placeholder="Nhập tiêu đề ..." value="Làm tài liệu cấu trúc khoa CNTT">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="taskname" class="col-form-label col-lg-2">Người thực hiện</label>
                                    <div class="col-lg-10">
                                        <select name="users[]" id="users" class="select2 select2-multiple form-control"
                                            multiple data-placeholder="Chọn thực hiện ...">
                                            <option value="1" selected>Nam</option>
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
                                            <option value="1" selected>Công việc khoa</option>
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
                                                name="start" value="05/05/2024"/>
                                            <input type="text" class="form-control" placeholder="Ngày kết thúc"
                                                name="end" value="05/09/2024" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="priority" class="col-form-label col-lg-2">Mức độ ưu tiên</label>
                                    <div class="col-lg-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Thấp</option>
                                            <option value="">Bình thường</option>
                                            <option value="" selected>Cao</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="progress" class="col-form-label col-lg-2">Tiến độ</label>
                                    <div class="col-lg-10">
                                        <input id="progress" name="progress" type="text" class="form-control"
                                            placeholder="Nhập tiến độ ..." value="30%">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="estimated_time" class="col-form-label col-lg-2">Thời gian dự kiến hoàn
                                        thành</label>
                                    <div class="col-lg-10">
                                        <input id="estimated_time" name="estimated_time" type="text" class="form-control"
                                            placeholder="Nhập thời gian dự kiến hoàn thành ..." value="31/08/2024">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Mô tả</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor" name="area">
                                            Làm tài liệu cấu trúc khoa CNTT
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="status" class="col-form-label col-lg-2">Trạng thái</label>
                                    <div class="col-lg-10">
                                        <select name="" id="" class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="" selected>Đang làm</option>
                                            <option value="">Đã hoàn thành</option>
                                            <option value="">Đã huỷ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h5 class="font-size-15"><i class="bx bx-message-dots text-muted align-middle me-1"></i> Bình luận :</h5>

                                    <div>
                                        <div class="d-flex py-3">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title rounded-circle bg-light text-primary">
                                                        <i class="bx bxs-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1">Nguyễn Văn ĐỨc <small class="text-muted float-end">1 giờ trước</small></h5>
                                                <p class="text-muted">Tôi cần tài liệu của phần giáo viên. Hãy chia sẽ với tôi.</p>
                                                <div>
                                                    <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Trả lời</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex py-3 border-top">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle">
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1">Trần Bích Thuỷ <small class="text-muted float-end">2 giờ trước</small></h5>
                                                <p class="text-muted">Ok. Tôi sẽ cung cấp cho bạn</p>
                                                <div>
                                                    <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Trả lời</a>
                                                </div>

                                                <div class="d-flex pt-3">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-light text-primary">
                                                                <i class="bx bxs-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-14 mb-1">Đặng Phương Mai <small class="text-muted float-end">2 giờ trước</small></h5>
                                                        <p class="text-muted">Tôi tôi chia sẻ cho nhé.</p>
                                                        <div>
                                                            <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Trả lời</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex py-3 border-top">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title rounded-circle bg-light text-primary">
                                                        <i class="bx bxs-user"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1">Nguyễn Đình Long <small class="text-muted float-end">12/03</small></h5>
                                                <p class="text-muted">Hay chú ý vào tài liệu đặc tả.</p>
                                                <div>
                                                    <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Trả lời</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5 class="font-size-16 mb-3">Để lại lời nhắn</h5>

                                    <form>
                                        <div class="mb-3">
                                            <label for="commentmessage-input" class="form-label">Lời nhắn</label>
                                            <textarea class="form-control" id="commentmessage-input" placeholder="Lời nhắn của bạn..." rows="3"></textarea>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success w-sm">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>

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
