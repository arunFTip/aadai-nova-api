<?php

namespace App\Common\UserManagement\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Common\Authentication\Resources\UserResource;

class UserShowController extends BaseController
{
    public function __invoke(User $user): JsonResponse
    {
        return $this->successResponse([
            'user' => new UserResource($user),
        ], 'User fetched successfully');
    }
}
