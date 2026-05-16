<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use App\Common\Authorization\Models\Role;

class RoleListController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        $roles = Role::with('permissions')
            ->latest()
            ->get();

        return $this->successResponse([
            'roles' => $roles,
        ], 'Roles fetched successfully');
    }
}
