<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Truy cập quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('Tạo quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('Tạo quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::create($request->validated() + ['password' => bcrypt($request->password)]);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with([
            'message' => 'Thêm thành công !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('Chỉnh sửa quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::pluck('title', 'id');

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        abort_if(Gate::denies('Chỉnh sửa quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->update($request->validated() + ['password' => bcrypt($request->password)]);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with([
            'message' => 'Cập nhật thành công !',
            'alert-type' => 'info'
        ]);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('Xóa quản lý người dùng'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->delete();

        return redirect()->route('admin.users.index')->with([
            'message' => 'Xóa thành công !',
            'alert-type' => 'danger'
        ]);
    }

     /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}