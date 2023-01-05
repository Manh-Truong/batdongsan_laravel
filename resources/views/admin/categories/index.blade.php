@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Danh mục') }}
                </h6>
                <div class="ml-auto">
                    @can('Tạo danh mục')
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <span class="icon text-white">
                            Thêm danh mục
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable datatable-category" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Tên danh mục') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr data-entry-id="{{ $category->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt" style="margin-top: 8px"></i>
                                            Sửa
                                        </a>
                                        <form onclick="return confirm('bạn có chắc không ? ')"  class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
                                <td colspan="7" class="text-center">{{ __('Không có danh mục nào') }}</td>
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
  $('.datatable-category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush