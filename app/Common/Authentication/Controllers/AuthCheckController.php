<?php

namespace App\Common\Authentication\Controllers;

use App\Common\Authentication\Actions\CheckAuthenticationModuleAction;
use App\Platform\Base\BaseController;
use Illuminate\Http\JsonResponse;

class AuthCheckController extends BaseController
{
    public function __invoke(CheckAuthenticationModuleAction $action): JsonResponse
    {
        return $this->successResponse(
            $action->execute(),
            'Authentication module is working'
        );
    }
}
