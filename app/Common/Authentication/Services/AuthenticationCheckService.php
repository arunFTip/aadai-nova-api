<?php

namespace App\Common\Authentication\Services;

use App\Common\Authentication\Repositories\AuthenticationCheckRepository;
use App\Platform\Base\BaseService;

class AuthenticationCheckService extends BaseService
{
    public function __construct(
        private AuthenticationCheckRepository $repository
    ) {}

    public function getStatus(): array
    {
        return $this->repository->getStatus();
    }
}
