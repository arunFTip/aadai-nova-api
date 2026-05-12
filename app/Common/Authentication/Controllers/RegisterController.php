<?php

namespace App\Common\Authentication\Controllers;

use App\Common\Authentication\Actions\RegisterUserAction;
use App\Common\Authentication\Requests\RegisterRequest;
use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use App\Common\Authentication\Resources\UserResource;

class RegisterController extends BaseController
{
    public function __invoke(
        RegisterRequest $request,
        RegisterUserAction $action
    ): JsonResponse {
        $user = $action->execute($request->validated());

        return $this->successResponse([
            'user' => new UserResource($user),
        ], 'User registered successfully', 201);
    }
}
