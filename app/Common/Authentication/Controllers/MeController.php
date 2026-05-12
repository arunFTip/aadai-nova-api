<?php

namespace App\Common\Authentication\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Common\Authentication\Resources\UserResource;

class MeController extends BaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        return $this->successResponse([
            'user' => new UserResource($request->user()),
        ], 'Authenticated user fetched successfully');
    }
}
