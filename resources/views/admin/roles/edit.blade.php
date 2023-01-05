@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Sửa vai trò')}}</h1>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Trở lại') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Vai trò</label>
                        <input type="text" class="form-control" id="title" placeholder="Vai trò" name="title" value="{{ old('title', $role->title) }}" />
                    </div>
                    <div class="form-group">
                        <label for="permissions">{{ __('Quyền có thể') }}</label>
                        <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple" required style="height: 50vh">
                            @foreach($permissions as $id => $permissions)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Cập nhật')}}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection