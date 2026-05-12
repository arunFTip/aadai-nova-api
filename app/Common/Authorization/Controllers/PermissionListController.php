<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Permission;

class PermissionListController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        $permissions = Permission::latest()->get();

        return $this->successResponse([
            'permissions' => $permissions,
        ], 'Permissions fetched successfully');
    }
}
