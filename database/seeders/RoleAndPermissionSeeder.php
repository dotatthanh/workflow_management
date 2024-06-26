<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm vai trò
        $super_admin = Role::create(['name' => 'Admin']);
        $department = Role::create(['name' => 'Trưởng bộ môn']);

        // Gán vai trò
        User::find(1)->assignRole('Admin');

        // $view_user = Permission::create(['name' => 'Xem danh sách tài khoản']);
        // $create_user = Permission::create(['name' => 'Thêm tài khoản']);
        // $edit_user = Permission::create(['name' => 'Chỉnh sửa tài khoản']);
        // $delete_user = Permission::create(['name' => 'Xóa tài khoản']);

        // $super_admin->givePermissionTo($view_user);
        // $super_admin->givePermissionTo($create_user);
        // $super_admin->givePermissionTo($edit_user);
        // $super_admin->givePermissionTo($delete_user);

        $view_label = Permission::create(['name' => 'Xem danh sách nhãn dán']);
        $create_label = Permission::create(['name' => 'Thêm nhãn dán']);
        $edit_label = Permission::create(['name' => 'Chỉnh sửa nhãn dán']);
        $delete_label = Permission::create(['name' => 'Xóa nhãn dán']);

        $super_admin->givePermissionTo($view_label);
        $super_admin->givePermissionTo($create_label);
        $super_admin->givePermissionTo($edit_label);
        $super_admin->givePermissionTo($delete_label);

        // Thêm quyền
        // $view_task = Permission::create(['name' => 'Xem danh sách công việc']);
        // $detail_task = Permission::create(['name' => 'Xem chi tiết công việc']);
        // $create_task = Permission::create(['name' => 'Thêm công việc']);
        // $edit_task = Permission::create(['name' => 'Chỉnh sửa công việc']);
        // $delete_task = Permission::create(['name' => 'Xóa công việc']);

        // // Set quyền cho vai trò admin
        // $super_admin->givePermissionTo($view_task);
        // $super_admin->givePermissionTo($detail_task);
        // $super_admin->givePermissionTo($create_task);
        // $super_admin->givePermissionTo($edit_task);
        // $super_admin->givePermissionTo($delete_task);

        // $department->givePermissionTo($view_task);
        // $department->givePermissionTo($detail_task);
        // $department->givePermissionTo($create_task);
        // $department->givePermissionTo($edit_task);
        // $department->givePermissionTo($delete_task);

        $view_role = Permission::create(['name' => 'Xem danh sách vai trò']);
        $create_role = Permission::create(['name' => 'Thêm vai trò']);
        $edit_role = Permission::create(['name' => 'Chỉnh sửa vai trò']);
        $delete_role = Permission::create(['name' => 'Xóa vai trò']);

        $super_admin->givePermissionTo($view_role);
        $super_admin->givePermissionTo($create_role);
        $super_admin->givePermissionTo($edit_role);
        $super_admin->givePermissionTo($delete_role);

        $view_permission = Permission::create(['name' => 'Xem danh sách quyền']);
        $view_permission_detail = Permission::create(['name' => 'Xem quyền']);
        $edit_permission = Permission::create(['name' => 'Chỉnh sửa quyền']);

        $super_admin->givePermissionTo($view_permission);
        $super_admin->givePermissionTo($view_permission_detail);
        $super_admin->givePermissionTo($edit_permission);

        $view_department = Permission::create(['name' => 'Xem danh sách bộ môn']);
        $create_department = Permission::create(['name' => 'Thêm bộ môn']);
        $edit_department = Permission::create(['name' => 'Chỉnh sửa bộ môn']);
        $delete_department = Permission::create(['name' => 'Xóa bộ môn']);

        $super_admin->givePermissionTo($view_department);
        $super_admin->givePermissionTo($create_department);
        $super_admin->givePermissionTo($edit_department);
        $super_admin->givePermissionTo($delete_department);
    }
}
