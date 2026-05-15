<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Common\Authorization\Requests\UpdateRoleRequest;

class RoleUpdateController extends BaseController
{
    public function __invoke(
        UpdateRoleRequest $request,
        Role $role
    ): JsonResponse {
        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return $this->successResponse([
            'role' => $role->load('permissions'),
        ], 'Role updated successfully');
    }
}
