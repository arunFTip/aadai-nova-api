<?php

namespace App\Common\UserManagement\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;

class UserDeleteController extends BaseController
{
    public function __invoke(User $user): JsonResponse
    {
        $user->delete();

        return $this->successResponse(
            null,
            'User deleted successfully'
        );
    }
}
