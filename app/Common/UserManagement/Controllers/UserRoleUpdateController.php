<?php

namespace App\Common\UserManagement\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use Illuminate\Http\Request;

class UserRoleUpdateController extends BaseController
{
    public function __invoke(
        Request $request,
        User $user
    ): JsonResponse {
        $request->validate([
            'roles' => ['nullable', 'array'],
        ]);

        $user->syncRoles($request->roles ?? []);

        return $this->successResponse([
            'user' => $user->load('roles'),
        ], 'User roles updated successfully');
    }
}
