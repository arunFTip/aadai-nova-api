<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use App\Common\Authorization\Models\Role;
use App\Common\Authorization\Requests\CreateRoleRequest;

class RoleCreateController extends BaseController
{
    public function __invoke(CreateRoleRequest $request): JsonResponse
    {
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        $role->syncPermissions($request->permissions ?? []);



        return $this->successResponse([
            'role' => $role->load('permissions'),
        ], 'Role created successfully');
    }
}
