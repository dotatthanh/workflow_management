@extends('admin.layouts.master')

@section('title')
    Tạo tài khoản
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tài khoản
        @endslot
        @slot('title')
            Tạo tài khoản
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tạo tài khoản</h4>

                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">

                        @include('admin.user._form', ['routeType' => 'create'])

                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection

@section('script')
    <!-- datepicker css -->
    <script src="{{ asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection

@section('css')
    <!-- datepicker css -->
    <link href="{{ asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
