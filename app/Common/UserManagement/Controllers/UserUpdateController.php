<?php

namespace App\Common\UserManagement\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Common\UserManagement\Requests\UpdateUserRequest;
use App\Common\Authentication\Resources\UserResource;

class UserUpdateController extends BaseController
{
    public function __invoke(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return $this->successResponse([
            'user' => new UserResource($user),
        ], 'User updated successfully');
    }
}
