<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['title' => 'Truy cập quản lý người dùng',],
            ['title' => 'Tạo quản lý người dùng',],
            ['title' => 'Chỉnh sửa quản lý người dùng',],
            ['title' => 'Xem quản lý người dùng',],
            ['title' => 'Xóa quản lý người dùng',],
            ['title' => 'Quyền truy cập',],
            ['title' => 'Quyền tạo',],
            ['title' => 'Quyền chỉnh sửa',],
            ['title' => 'Quyền xem',],
            [ 'title' => 'Quyền xóa',],
            [ 'title' => 'Truy cập vai trò',],
            [ 'title' => 'Tạo vai trò',],
            [ 'title' => 'Sửa vai trò',],
            [ 'title' => 'Xem vai trò',],
            [ 'title' => 'Xóa vai trò',],
            [ 'title' => 'Truy cập người dùng',],
            [ 'title' => 'Tạo người dùng',],
            [ 'title' => 'Sửa người dùng',],
            [ 'title' => 'Xem người dùng',],
            [ 'title' => 'Xóa người dùng',],
            [ 'title' => 'Truy cập danh mục',],
            [ 'title' => 'Tạo danh mục',],
            [ 'title' => 'Sửa danh mục',],
            [ 'title' => 'Xem danh mục',],
            [ 'title' => 'Xóa danh mục',],
            [ 'title' => 'Truy cập bài đăng',],
            [ 'title' => 'Tạo bài đăng',],
            [ 'title' => 'Sửa bài đăng',],
            [ 'title' => 'Xem bài đăng',],
            [ 'title' => 'Xóa bài đăng',],
        ];

            Permission::insert($permissions);

    }
}
