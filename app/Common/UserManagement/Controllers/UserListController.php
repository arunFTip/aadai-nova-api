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
        $search = request('search');
        $perPage = request('per_page', 10);
        $sortBy = request('sort_by', 'id');
        $sortDirection = request('sort_direction', 'desc');
        $status = request('status');

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perPage);

        return $this->successResponse([
            'users' => UserResource::collection($users->items()),
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'per_page' => $users->perPage(),
                'total' => $users->total(),
            ],
        ], 'Users fetched successfully');
    }
}
