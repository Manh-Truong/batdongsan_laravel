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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Thêm bài đăng mới') }}</h1>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Trở lại') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.properties.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category">{{ __('Danh mục') }}</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Tên bài đăng') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('tên bài đăng') }}" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('Giá') }}</label>
                        <input type="number" class="form-control" id="price" placeholder="{{ __('giá nhà') }}" name="price" value="{{ old('price') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">{{ __('Địa chỉ') }}</label>
                        <input type="text" class="form-control" id="location" placeholder="{{ __('địa chỉ') }}" name="location" value="{{ old('location') }}" />
                    </div>
                    <div class="form-group">
                        <label for="bed">{{ __('Số giường') }}</label>
                        <input type="number" class="form-control" id="bed" placeholder="{{ __('giường') }}" name="bed" value="{{ old('bed') }}" />
                    </div>
                    <div class="form-group">
                        <label for="bath">{{ __('Số bồn tắm') }}</label>
                        <input type="number" class="form-control" id="bath" placeholder="{{ __('bồn tắm') }}" name="bath" value="{{ old('bath') }}" />
                    </div>
                    <div class="form-group">
                        <label for="size">{{ __('Kích thước') }}</label>
                        <input type="number" class="form-control" id="size" placeholder="{{ __('m2') }}" name="size" value="{{ old('size') }}" />
                    </div>
                    <!-- <div class="form-group">
                        <label for="path">{{ __('Ảnh nổi bật') }}</label>
                        <input type="file" class="form-control" style="height: 45px;" id="path" name="path" value="{{ old('path') }}" />
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Tiện ích') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Các tiện ích cách nhau bởi dấu phẩy') }}" name="name" value="{{ old('name') }}" />
                    </div> -->
                    <div class="form-group">
                        <label for="description">{{ __('Mô tả') }}</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="mô tả chi tiết">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Lưu') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection