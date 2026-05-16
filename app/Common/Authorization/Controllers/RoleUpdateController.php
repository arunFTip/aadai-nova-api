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
        ]);

        $role->syncPermissions($request->permissions ?? []);
        activity()
            ->causedBy($request->user())
            ->performedOn($role)
            ->withProperties([
                'old' => [
                    'name' => $oldName,
                ],
                'attributes' => [
                    'name' => $role->name,
                ],
            ])
            ->log('updated');

        return $this->successResponse([
            'role' => $role->load('permissions'),
        ], 'Role updated successfully');
    }
}
