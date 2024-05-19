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

        $view_news = Permission::create(['name' => 'Xem danh sách tin tức']);
        $create_news = Permission::create(['name' => 'Thêm tin tức']);
        $edit_news = Permission::create(['name' => 'Chỉnh sửa tin tức']);
        $delete_news = Permission::create(['name' => 'Xóa tin tức']);

        $super_admin->givePermissionTo($view_news);
        $super_admin->givePermissionTo($create_news);
        $super_admin->givePermissionTo($edit_news);
        $super_admin->givePermissionTo($delete_news);

        $view_contact = Permission::create(['name' => 'Xem danh sách liên hệ']);
        $delete_contact = Permission::create(['name' => 'Xóa liên hệ']);

        $super_admin->givePermissionTo($view_contact);
        $super_admin->givePermissionTo($delete_contact);

        $view_product = Permission::create(['name' => 'Xem danh sách sản phẩm']);
        $create_product = Permission::create(['name' => 'Thêm sản phẩm']);
        $edit_product = Permission::create(['name' => 'Chỉnh sửa sản phẩm']);
        $delete_product = Permission::create(['name' => 'Xóa sản phẩm']);

        $super_admin->givePermissionTo($view_product);
        $super_admin->givePermissionTo($create_product);
        $super_admin->givePermissionTo($edit_product);
        $super_admin->givePermissionTo($delete_product);

        $view_info = Permission::create(['name' => 'Xem thông tin']);
        $edit_info = Permission::create(['name' => 'Chỉnh sửa thông tin']);

        $super_admin->givePermissionTo($view_info);
        $super_admin->givePermissionTo($edit_info);

        $view_customer = Permission::create(['name' => 'Xem danh sách khách hàng']);
        $delete_customer = Permission::create(['name' => 'Xóa khách hàng']);

        $super_admin->givePermissionTo($view_customer);
        $super_admin->givePermissionTo($delete_customer);

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

        $view_permission = Permission::create(['name' => 'Xem danh sách quyền']);
        $view_permission_detail = Permission::create(['name' => 'Xem quyền']);
        $edit_permission = Permission::create(['name' => 'Chỉnh sửa quyền']);

        $super_admin->givePermissionTo($view_permission);
        $super_admin->givePermissionTo($view_permission_detail);
        $super_admin->givePermissionTo($edit_permission);

    }
}
