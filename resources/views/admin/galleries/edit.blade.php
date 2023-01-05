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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Cập nhật ảnh')}}</h1>
                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Trở lại') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.properties.galleries.update', [$property->id,$gallery->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="path">{{ __('Hình ảnh nổi bật') }}</label>
                        <input type="file" class="form-control" style="height: 45px;" id="path" name="path" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Cập nhật')}}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection