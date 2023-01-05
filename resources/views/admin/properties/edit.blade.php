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
        <div class="row mb-5">
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold text-primary">
                        {{ __('Các tiện ích') }}
                        </h6>
                   </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable datatable-property" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Tiện ích') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($property->features as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feature->name }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.properties.features.edit', [$property->id, $feature->id]) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil-alt" style="margin-top: 7px"></i>
                                                    Sửa
                                                </a>
                                                <form onclick="return confirm('bạn có chắc không ? ')"  class="d-inline" action="{{ route('admin.properties.features.destroy', [$property->id, $feature->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                        <i class="fa fa-trash"></i>
                                                        Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Thêm tiện ích')}}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.properties.features.store', $property->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Tiện ích') }}</label>
                                <input type="text" class="form-control" id="name" placeholder="{{ __('Tiện ích') }}" name="name" value="{{ old('name') }}" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Thêm')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex">
                        <h6 class="m-0 font-weight-bold text-primary">
                        {{ __('Danh sách hình ảnh') }}
                        </h6>
                   </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable datatable-property" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Ảnh') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($property->galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a target="_blank" href="{{ Storage::url($gallery->path) }}">
                                                <img width="100" height="60" src="{{ Storage::url($gallery->path) }}" alt="{{ $property->name }}">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.properties.galleries.edit', [$property->id, $gallery->id]) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil-alt" style="margin-top: 7px"></i>
                                                    Sửa
                                                </a>
                                                <form onclick="return confirm('bạn có chắc không ? ')"  class="d-inline" action="{{ route('admin.properties.galleries.destroy', [$property->id, $gallery->id]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                        <i class="fa fa-trash"></i>
                                                        Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="3">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Thêm ảnh')}}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.properties.galleries.store', $property->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="path">{{ __('Ảnh nổi bật') }}</label>
                                <input type="file" class="form-control" style="height: 45px;" id="path" name="path" value="{{ old('path') }}" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Thêm')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Sửa bài đăng')}}</h1>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Trở lại') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="category">{{ __('Danh mục') }}</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach($categories as $category)
                            <option {{ $category->id == $property->category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Tên bài đăng') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="name" value="{{ old('name', $property->name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('Giá') }}</label>
                        <input type="number" class="form-control" id="price" placeholder="{{ __('price') }}" name="price" value="{{ old('price', $property->price) }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">{{ __('Địa chỉ') }}</label>
                        <input type="text" class="form-control" id="location" placeholder="{{ __('location') }}" name="location" value="{{ old('location', $property->location) }}" />
                    </div>
                    <div class="form-group">
                        <label for="bed">{{ __('Số giường') }}</label>
                        <input type="number" class="form-control" id="bed" placeholder="{{ __('bed') }}" name="bed" value="{{ old('bed', $property->bed) }}" />
                    </div>
                    <div class="form-group">
                        <label for="bath">{{ __('Số bồn tắm') }}</label>
                        <input type="number" class="form-control" id="bath" placeholder="{{ __('bath') }}" name="bath" value="{{ old('bath', $property->bath) }}" />
                    </div>
                    <div class="form-group">
                        <label for="size">{{ __('Kích thước') }}</label>
                        <input type="number" class="form-control" id="size" placeholder="{{ __('size') }}" name="size" value="{{ old('size', $property->size) }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Mô tả') }}</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Mô tả chi tiết">{{ old('description', $property->description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Cập nhật')}}</button>
                </form>
            </div>
        </div>
</div>
@endsection