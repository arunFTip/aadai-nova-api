<?php

namespace App\Common\Authorization\Controllers;

use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionCheckController extends BaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        return $this->successResponse([
            'can_view_user' => $request->user()->can('user.view'),
            'can_create_user' => $request->user()->can('user.create'),
        ], 'Permission checked successfully');
    }
}
