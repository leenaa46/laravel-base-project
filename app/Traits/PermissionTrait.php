<?php

namespace App\Traits;

use function auth;

trait PermissionTrait
{
    /**
     * User must have permission to continue.
     *
     * @param string $permission
     * @return void
     */
    public function mustHavePermission(string | array $permission)
    {
        if (\is_array($permission)) $this->mustHaveOneOfPermission($permission);
        elseif (!auth()->user() || !auth()->user()->hasPermissionTo($permission)) \abort(403, __('fail.no_permission'));
    }

    /**
     * User must have permission to continue.
     *
     * @param array $permission
     * @return void
     */
    public function mustHaveOneOfPermission(array $permission)
    {
        if (!auth()->user()) \abort(403, __('fail.no_permission'));

        $hasPermission = false;
        foreach ($permission as $permissionItem) {
            if (auth()->user()->hasPermissionTo($permissionItem)) {
                $hasPermission = true;
                break;
            };
        }

        if (!$hasPermission) \abort(403, __('fail.no_permission'));
    }
}
