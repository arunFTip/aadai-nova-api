<?php

namespace App\Common\Authentication\Repositories;

use App\Platform\Base\BaseRepository;

class AuthenticationCheckRepository extends BaseRepository
{
    public function getStatus(): array
    {
        return [
            'module' => 'Authentication',
            'status' => 'repository working',
        ];
    }
}
