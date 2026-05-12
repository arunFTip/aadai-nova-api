<?php

namespace App\Common\Authentication\Actions;

use App\Common\Authentication\Services\AuthenticationCheckService;
use App\Platform\Base\BaseAction;

class CheckAuthenticationModuleAction extends BaseAction
{
    public function __construct(
        private AuthenticationCheckService $service
    ) {}

    public function execute(): array
    {
        return $this->service->getStatus();
    }
}
