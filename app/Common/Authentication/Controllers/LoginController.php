<?php

namespace App\Common\Authentication\Controllers;

use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Common\Authentication\Requests\LoginRequest;
use App\Common\Authentication\Resources\UserResource;
use App\Common\Authentication\Actions\LoginUserAction;

class LoginController extends BaseController
{
    public function __invoke(
        LoginRequest $request,
        LoginUserAction $action
    ): JsonResponse {
        $result = $action->execute($request->validated());

        return $this->successResponse([
            'user' => new UserResource($result['user']),
            'token' => $result['token'],
        ], 'Login successful');
    }
}
