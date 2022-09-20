<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'pages',
            'client_message',
            'setting-role-list',
            'setting-role-create',
            'setting-role-edit',
            'setting-role-delete',

            "setting-user-page",
            "setting-user-role",
            "setting-user-promission",

            // az inja

            'sms-list',
            'sms-create',
            'sms-edit',
            'sms-delete',

            'email-list',
            'email-create',
            'email-edit',
            'email-delete',

        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
