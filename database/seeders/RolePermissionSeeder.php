<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\User\RoleService;
use App\Services\User\PermissionService;
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
        $roleService = \resolve(RoleService::class);
        $permissionService = \resolve(PermissionService::class);

        $permissions = \config("role_permissions.permissions");

        foreach ($permissions as $permissionItem) {
            $permission = Permission::create([
                "display_name" => $permissionItem["en"],
                "name" => Str::slug($permissionItem["en"]),
                "guard_name" => 'api'
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

        $allPermissions = Permission::select('name')->get()->pluck('name')->toArray();

        foreach ($roles as $roleItem) {
            $roleService->save(new Request(
                [
                    "name" => $roleItem["en"],
                    "permissions" => $allPermissions,
                    "name_lao" => $roleItem["la"]
                ]
            ));
        }
    }
}
