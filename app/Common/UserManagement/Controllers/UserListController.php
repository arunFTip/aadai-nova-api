<?php

namespace App\Common\UserManagement\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Common\Authentication\Resources\UserResource;

class UserListController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        $users = User::latest()->paginate(10);

        return $this->successResponse([
            'users' => UserResource::collection($users),
        ], 'Users fetched successfully');
    }
}
