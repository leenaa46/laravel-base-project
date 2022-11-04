<?php

namespace App\Services\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\Requests\RoleRequest;
use App\Services\TranslateService;
use App\Services\BaseService;
use App\Models\User;
use App\Models\Role;

class RoleService extends BaseService
{
    use RoleRequest;

    protected $model;
    protected static $COMMON_RELATIONSHIP = ['permissions'];

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function all()
    {
        $query = $this->model->query()
            ->with(self::$COMMON_RELATIONSHIP);

        return $this->formatQuery($query, ['name', 'display_name']);
    }

    public function getByModel(Role $role, $withRelation = \true)
    {
        if ($withRelation)  $role->load(self::$COMMON_RELATIONSHIP);
        return $role;
    }

    public function save(Request $request)
    {
        $this->validateSave($request);

        DB::beginTransaction();
        try {
            $role = $this->model->newInstance();
            $role->guard_name = 'api';
            $role->display_name = $request->name;
            $role->name = Str::slug($request->name);
            $role->save();

            (\resolve(PermissionService::class))->managePermission(
                new Request([
                    'action' => 'give',
                    'model_type' => 'roles',
                    'model_id' => $role->id,
                    'permissions' => $request->permissions
                ])
            );

            if ($request->name_lao) {
                (\resolve(TranslateService::class))->translate(
                    new Request(
                        [
                            "language_short" => 'la',
                            "data" => [
                                [
                                    "column" => "display_name",
                                    "value" => $request->name_lao
                                ]
                            ]
                        ]
                    ),
                    $role
                );
            }


            DB::commit();

            return $this->getByModel($role, $request->without_relation);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function update(Request $request, Role $role)
    {
        $this->validateUpdate($request, $role);

        $role->display_name = $request->name;
        $role->name = Str::slug($request->name);
        $role->save();

        return $request->without_relation
            ? $role
            : $this->getByModel($role);
    }

    public function delete(Role $role)
    {
        if ($role->permissions->count() > 0) abort(400, __('fail.data_in_used', ['data' => 'Role', 'other' => 'Permissions']));
        if ($role->users->count() > 0) abort(400, __('fail.data_in_used', ['data' => 'Role', 'other' => 'Users']));

        return $role->delete();
    }

    public function manageRoleUser(Request $request, User $user)
    {
        $this->validateGiveRole($request);

        DB::beginTransaction();
        try {
            switch ($request->action) {
                case 'give':
                    $user->assignRole($request->roles);
                    break;
                case 'remove':
                    foreach ($request->roles as $role) {
                        $user->assignRole($role);
                    }
                    break;
                case 'sync':
                    $user->syncRoles($request->roles);
                    break;
            }

            DB::commit();

            return $user->load('roles');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
