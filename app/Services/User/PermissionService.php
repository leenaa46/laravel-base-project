<?php

namespace App\Services\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\Requests\PermissionRequest;
use App\Services\BaseService;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class PermissionService extends BaseService
{
    use PermissionRequest;

    protected $model;
    protected static $COMMON_RELATIONSHIP = ['roles'];

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function all()
    {
        $query = $this->model->query()
            ->with(self::$COMMON_RELATIONSHIP);

        return $this->formatQuery($query, ['name', 'display_name']);
    }

    public function getByModel(Permission $permission, $withRelation = \true)
    {
        if ($withRelation)  $permission->load(self::$COMMON_RELATIONSHIP);
        return $permission;
    }

    public function managePermission(Request $request)
    {
        $this->validateGivePermission($request);

        $model = $request->model_type == 'user'
            ? User::findOrFail($request->model_id)
            : Role::findOrFail($request->model_id);

        DB::beginTransaction();
        try {
            switch ($request->action) {
                case 'give':
                    $model->givePermissionTo($request->permissions);
                    break;
                case 'remove':
                    foreach ($request->permissions as $permission) {
                        $model->givePermissionTo($permission);
                    }
                    break;
                case 'sync':
                    $model->syncPermissions($request->permissions);
                    break;
            }

            DB::commit();

            return $model->load('Permissions');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
