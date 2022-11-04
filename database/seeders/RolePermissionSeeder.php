<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\TranslateService;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $translateService = \resolve(TranslateService::class);

        $permissions = \config("role_permissions.permissions");

        foreach ($permissions as $permissionItem) {
            $permission = Permission::create([
                "display_name" => $permissionItem["en"],
                "name" => Str::slug($permissionItem["en"])
            ]);

            $translateService->translate(
                new Request([
                    "language_short" => "la",
                    "data" => [
                        [
                            "column" => "name",
                            "value" => $permissionItem["la"],
                        ]
                    ]
                ]),
                $permission
            );
        }

        $roles = \config("role_permissions.roles");

        foreach ($roles as $roleItem) {
            $role = Role::create([
                "display_name" => $roleItem["en"],
                "name" => Str::slug($roleItem["en"])
            ]);

            $translateService->translate(
                new Request([
                    "language_short" => "la",
                    "data" => [
                        [
                            "column" => "name",
                            "value" => $roleItem["la"],
                        ]
                    ]
                ]),
                $role
            );
        }
    }
}
