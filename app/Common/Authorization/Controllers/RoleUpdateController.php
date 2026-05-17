<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use App\Common\Authorization\Models\Role;
use App\Common\Authorization\Requests\UpdateRoleRequest;

class RoleUpdateController extends BaseController
{
    public function __invoke(
        UpdateRoleRequest $request,
        Role $role
    ): JsonResponse {
        $oldName = $role->name;
        $role->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        $role->syncPermissions($request->permissions ?? []);


        return $this->successResponse([
            'role' => $role->load('permissions'),
        ], 'Role updated successfully');
    }
}
