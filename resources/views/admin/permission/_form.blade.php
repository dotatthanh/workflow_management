@csrf

<h4 class="card-title">Thông tin cơ bản</h4>
<p class="card-title-desc">Vui lòng điền đầy đủ thông tin bên dưới</p>

<div class="row">
    @foreach ($permissions as $permission)
	    <div class="col-sm-4">
	        <div class="custom-control custom-checkbox custom-checkbox-info mb-3">
	            <input name="permissions[{{ $permission->id }}]" type="checkbox" class="custom-control-input" id="customCheckcolor{{ $permission->id }}" {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
	            <label class="custom-control-label" for="customCheckcolor{{ $permission->id }}">{{ $permission->name }}</label>
	        </div>
	    </div>
    @endforeach
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('permissions.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
