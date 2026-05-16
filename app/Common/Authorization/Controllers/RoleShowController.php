<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use App\Common\Authorization\Models\Role;

class RoleShowController extends BaseController
{
    public function __invoke(Role $role): JsonResponse
    {
        return $this->successResponse([
            'role' => $role->load('permissions'),
        ], 'Role fetched successfully');
    }
}
