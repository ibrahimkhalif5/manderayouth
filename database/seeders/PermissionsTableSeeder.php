<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'application_create',
            ],
            [
                'id'    => 24,
                'title' => 'application_edit',
            ],
            [
                'id'    => 25,
                'title' => 'application_show',
            ],
            [
                'id'    => 26,
                'title' => 'application_delete',
            ],
            [
                'id'    => 27,
                'title' => 'application_access',
            ],
            [
                'id'    => 28,
                'title' => 'career_create',
            ],
            [
                'id'    => 29,
                'title' => 'career_edit',
            ],
            [
                'id'    => 30,
                'title' => 'career_show',
            ],
            [
                'id'    => 31,
                'title' => 'career_delete',
            ],
            [
                'id'    => 32,
                'title' => 'career_access',
            ],
            [
                'id'    => 33,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 34,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 35,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 36,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 37,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 38,
                'title' => 'access_control_access',
            ],
            [
                'id'    => 39,
                'title' => 'partner_create',
            ],
            [
                'id'    => 40,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 41,
                'title' => 'partner_show',
            ],
            [
                'id'    => 42,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 43,
                'title' => 'partner_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
