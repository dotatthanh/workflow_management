<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo vai trò
        $super_admin = Role::create(['name' => 'Admin']);

        // Gán vai trò
        User::find(1)->assignRole('Admin');

        // Tạo quyền
        $view_category = Permission::create(['name' => 'Xem danh sách danh mục']);
        $create_category = Permission::create(['name' => 'Thêm danh mục']);
        $edit_category = Permission::create(['name' => 'Chỉnh sửa danh mục']);
        $delete_category = Permission::create(['name' => 'Xóa danh mục']);

        // Set quyền cho vai trò admin
        $super_admin->givePermissionTo($view_category);
        $super_admin->givePermissionTo($create_category);
        $super_admin->givePermissionTo($edit_category);
        $super_admin->givePermissionTo($delete_category);

        $view_user = Permission::create(['name' => 'Xem danh sách tài khoản']);
        $create_user = Permission::create(['name' => 'Thêm tài khoản']);
        $edit_user = Permission::create(['name' => 'Chỉnh sửa tài khoản']);
        $delete_user = Permission::create(['name' => 'Xóa tài khoản']);

        $super_admin->givePermissionTo($view_user);
        $super_admin->givePermissionTo($create_user);
        $super_admin->givePermissionTo($edit_user);
        $super_admin->givePermissionTo($delete_user);

        $view_role = Permission::create(['name' => 'Xem danh sách vai trò']);
        $create_role = Permission::create(['name' => 'Thêm vai trò']);
        $edit_role = Permission::create(['name' => 'Chỉnh sửa vai trò']);
        $delete_role = Permission::create(['name' => 'Xóa vai trò']);

        $super_admin->givePermissionTo($view_role);
        $super_admin->givePermissionTo($create_role);
        $super_admin->givePermissionTo($edit_role);
        $super_admin->givePermissionTo($delete_role);

        $view_label = Permission::create(['name' => 'Xem danh sách dán nhãn']);
        $create_label = Permission::create(['name' => 'Thêm dán nhãn']);
        $edit_label = Permission::create(['name' => 'Chỉnh sửa dán nhãn']);
        $delete_label = Permission::create(['name' => 'Xóa dán nhãn']);

        $super_admin->givePermissionTo($view_label);
        $super_admin->givePermissionTo($create_label);
        $super_admin->givePermissionTo($edit_label);
        $super_admin->givePermissionTo($delete_label);

        $view_permission = Permission::create(['name' => 'Xem danh sách quyền']);
        $view_permission_detail = Permission::create(['name' => 'Xem quyền']);
        $edit_permission = Permission::create(['name' => 'Chỉnh sửa quyền']);

        $super_admin->givePermissionTo($view_permission);
        $super_admin->givePermissionTo($view_permission_detail);
        $super_admin->givePermissionTo($edit_permission);

    }
}
