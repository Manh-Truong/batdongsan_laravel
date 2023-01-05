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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Cập nhật tiện ích')}}</h1>
                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Trở lại') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.properties.features.update', [$property->id,$feature->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">{{ __('Tiện ích') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Các tiện ích cách nhau bởi dấu phẩy') }}" name="name" value="{{ old('name', $feature->name) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Cập nhật')}}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection