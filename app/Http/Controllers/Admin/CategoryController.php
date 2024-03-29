<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\ValidateCategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
   
    public function index(): View
    {
        abort_if(Gate::denies('Truy cập danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        abort_if(Gate::denies('Tạo danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.categories.create');
    }

    public function store(ValidateCategoryRequest $request): RedirectResponse
    {
        abort_if(Gate::denies('Tạo danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slug = Str::slug($request->name, '-');
        Category::create($request->validated() + ['slug' => $slug]);

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Thêm thành công !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Category $category): View
    {
        abort_if(Gate::denies('Truy cập danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        abort_if(Gate::denies('Sửa danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.categories.edit', compact('category'));
    }

    public function update(ValidateCategoryRequest $request, Category $category): RedirectResponse
    {
        abort_if(Gate::denies('Sửa danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $slug = Str::slug($request->name, '-');
        $category->update($request->validated() + ['slug' => $slug]);

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Cập nhật thành công !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        abort_if(Gate::denies('Xóa danh mục'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->delete();

        return back()->with([
            'message' => 'Xóa thành công !',
            'alert-type' => 'danger'
        ]);
    }
}
