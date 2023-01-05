@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
        <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Vai trò') }}
                </h6>
                <div class="ml-auto">
                    @can('Tạo vai trò')
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                        <span class="icon text-white">
                            Thêm vai trò
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable datatable-Role" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vai trò</th>
                                <th>Quyền có thể</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    @foreach($role->permissions as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt" style="margin-top:8px"></i>
                                        Sửa
                                    </a>
                                    <form onclick="return confirm('bạn có chắc không ? ')"  class="d-inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
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
                                <td colspan="7" class="text-center">{{ __('không có dữ liệu') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection

@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 50,
  });
  $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush