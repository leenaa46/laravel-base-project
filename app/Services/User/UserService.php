<?php

namespace App\Services\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\Requests\UserRequest;
use App\Services\BaseService;
use App\Models\User;

class UserService extends BaseService
{
    use UserRequest;

    protected $model;
    protected static $COMMON_RELATIONSHIP = ['roles.permissions'];

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        $query = $this->model->query()
            ->with(self::$COMMON_RELATIONSHIP);

        return $this->formatQuery($query, ['name', 'phone', 'email'], ['phone', 'email']);
    }

    public function getByModel(User $user, $withRelation = \true)
    {
        if ($withRelation)  $user->load(self::$COMMON_RELATIONSHIP);
        return $user;
    }

    public function save(Request $request)
    {
        $this->validateSave($request);

        DB::beginTransaction();
        try {
            $user = $this->model->newInstance();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = \bcrypt($request->password);
            $user->save();

            \resolve(RoleService::class)->manageRoleUser(
                new Request([
                    "roles" => $request->roles,
                    "action" => "give"
                ]),
                $user
            );

            if ($request->profile_image)
                $this->addFileToModel($request->profile_image, $user, $user->profile_image_collection_name);

            DB::commit();

            return $request->without_relation
                ? $user
                : $this->getByModel($user);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function update(Request $request, User $user)
    {
        $this->validateUpdate($request, $user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return $request->without_relation
            ? $user
            : $this->getByModel($user);
    }

    public function delete(User $user)
    {
        // if ($user->permissions->count() > 0) abort(400, __('fail.data_in_used', ['data' => 'User', 'other' => 'Permissions']));

        return $user->delete();
    }
}
