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
                <h1 class="h3 mb-0 text-gray-800">{{ __('Sửa thông tin')}}</h1>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.agents.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">{{ __('Tên') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('Tên') }}" name="name" value="{{ old('name', $user->name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email',  $user->email) }}" />
                    </div>
                    <div class="form-group">
                        <label for="fax">{{ __('fax') }}</label>
                        <input type="number" class="form-control" id="fax" placeholder="{{ __('fax') }}" name="fax" value="{{ old('fax',  $user->fax) }}" />
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('Điện thoại') }}</label>
                        <input type="number" class="form-control" id="phone" placeholder="{{ __('điện thoại') }}" name="phone" value="{{ old('phone',  $user->phone) }}" />
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">{{ __('whatsapp') }}</label>
                        <input type="number" class="form-control" id="whatsapp" placeholder="{{ __('whatsapp') }}" name="whatsapp" value="{{ old('whatsapp',  $user->whatsapp) }}" />
                    </div>
                    <div class="form-group">
                        <img width="200" height="200" src="{{ Storage::url($user->profile) }}" class="img-fluid rounded" alt="">
                    </div>
                    <div class="form-group">
                        <label for="profile">{{ __('Hình ảnh') }}</label>
                        <input type="file" class="form-control" style="height: 45px;" id="profile" placeholder="{{ __('hình ảnh') }}" name="profile" value="{{ old('profile',  $user->profile) }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Mật khẩu') }}</label>
                        <input type="password" class="form-control" id="password" placeholder="{{ __('Mật khẩu') }}" name="password" value="{{ old('password', $user->password) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Cập nhật')}}</button>
                </form>
            </div>
        </div>
    <!-- Content Row -->
</div>
@endsection