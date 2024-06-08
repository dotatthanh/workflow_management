<div class="form-group row mb-4">
    <label for="title" class="col-form-label col-lg-2">Tiêu đề <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <input id="title" name="title" type="text" class="form-control" {{ isset($isDetailPage) ? 'readonly' : ''}}
            placeholder="Nhập tiêu đề" value="{{ old('title', $data_edit->title ?? '') }}">
        {!! $errors->first('title', '<span class="error">:message</span>') !!}
    </div>
</div>

@hasrole('Admin')
<div class="form-group row mb-4">
    <label for="department_id" class="col-form-label col-lg-2">Bộ môn <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <select name="department_id" id="department_id" class="form-control" {{ isset($isDetailPage) ? 'disabled' : ''}} onchange="changeDepartment()">
            <option value="">Chọn bộ môn</option>
            @foreach ($departments as $item)
                <option value="{{ $item->id }}"
                    {{ old('department_id', $data_edit->department_id ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('department_id', '<span class="error">:message</span>') !!}
    </div>
</div>
@endhasrole

@hasanyrole('Admin|Trưởng bộ môn')
<div class="form-group row mb-4">
    <label for="users" class="col-form-label col-lg-2">Người thực hiện</label>
    <div class="col-lg-10">
        <select name="users[]" id="users"
            {{ isset($isDetailPage) ? 'disabled' : ''}}
            class="select2 select2-multiple form-control" multiple
            data-placeholder="Chọn người thực hiện">
            @foreach ($users as $item)
                <option
                    {{ isset($data_edit) && in_array($item->id, old('users', $data_edit->users->pluck('id')->toArray())) ? 'selected' : '' }}
                    value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('users', '<span class="error">:message</span>') !!}
    </div>
</div>
@endhasanyrole

<div class="form-group row mb-4">
    <label for="labels" class="col-form-label col-lg-2">Nhãn dán</label>
    <div class="col-lg-10">
        <select name="labels[]" id="labels"
            {{ isset($isDetailPage) ? 'disabled' : ''}}
            class="select2 select2-multiple form-control" multiple
            data-placeholder="Chọn nhãn dán">
            @foreach ($labels as $item)
                <option
                    {{ isset($data_edit) && in_array($item->id, old('labels', $data_edit->labels->pluck('id')->toArray())) ? 'selected' : '' }}
                    value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('labels', '<span class="error">:message</span>') !!}
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2">Thời gian</label>
    <div class="col-lg-10">
        <div class="input-daterange input-group" data-provide="datepicker">
            <input type="text" class="form-control" placeholder="Ngày bắt đầu" name="start_date" {{ isset($isDetailPage) ? 'disabled' : ''}} value="{{ old('start_date', isset($data_edit->start_date) ? date('d-m-Y', strtotime($data_edit->start_date)) : '') }}" />
            <input type="text" class="form-control" placeholder="Ngày kết thúc" name="end_date" {{ isset($isDetailPage) ? 'disabled' : ''}} value="{{ old('end_date', isset($data_edit->end_date) ? date('d-m-Y', strtotime($data_edit->end_date)) : '') }}" />
        </div>
        <div class="d-flex">
            {!! $errors->first('start_date', '<span class="error w-50">:message</span>') !!}
            {!! $errors->first('end_date', '<span class="error w-50">:message</span>') !!}
        </div>
    </div>
</div>

<div class="form-group row mb-4">
    <label for="priority" class="col-form-label col-lg-2">Mức độ ưu tiên <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <select name="priority" id="priority" class="form-control" {{ isset($isDetailPage) ? 'disabled' : ''}}>
            @foreach (getConst('priorityTasks') as $key => $name)
                <option value="{{ $key }}"
                    {{ old('priority', $data_edit->priority ?? '') == $key ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('priority', '<span class="error">:message</span>') !!}
    </div>
</div>

<div class="form-group row mb-4">
    <label for="progress" class="col-form-label col-lg-2">Tiến độ</label>
    <div class="col-lg-1">
        <div class="input-group">
            <input id="progress" name="progress" type="number" class="form-control" {{ isset($isDetailPage) ? 'disabled' : ''}} placeholder="Nhập tiến độ" value="{{ old('progress', $data_edit->progress ?? '') }}">
            <div class="input-group-text">%</div>
        </div>
        {!! $errors->first('progress', '<span class="error">:message</span>') !!}
    </div>
</div>

<div class="form-group row mb-4">
    <label for="estimated_time" class="col-form-label col-lg-2">Thời gian dự kiến hoàn
        thành</label>
    <div class="col-lg-3">
        <div class="input-daterange" data-provide="datepicker">
            <input type="text" class="form-control" placeholder="Thời gian dự kiến hoàn thành" name="estimated_time" {{ isset($isDetailPage) ? 'disabled' : ''}} value="{{ old('estimated_time', isset($data_edit->estimated_time) ? date('d-m-Y', strtotime($data_edit->estimated_time)) : '') }}" />
        </div>
        {!! $errors->first('estimated_time', '<span class="error">:message</span>') !!}
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label col-lg-2" for="taskdesc-editor">Mô tả</label>
    <div class="col-lg-10">
        @if (isset($isDetailPage))
            {!! $data_edit->description !!}
        @else
            <textarea id="taskdesc-editor" name="description" >{{ old('description', $data_edit->description ?? '') }}</textarea>
            {!! $errors->first('description', '<span class="error">:message</span>') !!}
        @endif
    </div>
</div>

<div class="form-group row mb-4">
    <label for="status" class="col-form-label col-lg-2">Trạng thái <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <select name="status" id="" class="form-control" {{ isset($isDetailPage) ? 'disabled' : ''}}>
            @foreach (getConst('statusTasks') as $key => $name)
            <option value="{{ $key }}"
                {{ old('status', $data_edit->status ?? '') == $key ? 'selected' : '' }}>
                {{ $name }}</option>
            @endforeach
        </select>
        {!! $errors->first('status', '<span class="error">:message</span>') !!}
    </div>
</div>
