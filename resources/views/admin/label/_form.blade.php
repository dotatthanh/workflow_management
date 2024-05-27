@csrf

<h4 class="card-title">Thông tin cơ bản</h4>
<p class="card-title-desc">Vui lòng điền đầy đủ thông tin bên dưới</p>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group mb-3">
            <label for="name">Tên nhãn dán <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Tên nhãn dán" value="{{ old('name', $data_edit->name ?? '') }}">
            {!! $errors->first('name', '<span class="error">:message</span>') !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group mb-3">
            <label for="color">Màu sắc <span class="text-danger">*</span></label>
            <select class="form-control select2" name="color"  id="color">
                <option value="">Chọn màu sắc</option>
                @foreach (getConst('colors') as $key => $color)
                    <option value="{{ $key }}"
                        {{ old('color', $data_edit->color ?? '') == $key ? 'selected' : '' }}>
                        {{ $color }}</option>
                @endforeach
            </select>
            {!! $errors->first('color', '<span class="error">:message</span>') !!}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('labels.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
