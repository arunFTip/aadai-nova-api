<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Common\Authorization\Models\Role;

class RoleDeleteController extends BaseController
{
    public function __invoke(Role $role): JsonResponse
    {
        if ($role->name === 'super-admin') {
            return $this->errorResponse(
                'Super Admin role cannot be deleted',
                null,
                422
            );
        }



        DB::table('role_has_permissions')
            ->where('role_id', $role->id)
            ->delete();

        DB::table('model_has_roles')
            ->where('role_id', $role->id)
            ->delete();

        DB::table('roles')
            ->where('id', $role->id)
            ->delete();

        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        return $this->successResponse(
            null,
            'Role deleted successfully'
        );
    }
}
