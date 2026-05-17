<?php

namespace App\Common\Authorization\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;

class RoleListController extends BaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        $query = Role::query()
            ->with('permissions');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSorts = [
            'id',
            'name',
            'description',
        ];

        if (! in_array($sortBy, $allowedSorts)) {
            $sortBy = 'id';
        }

        $query->orderBy($sortBy, $sortDirection);

        $perPage = $request->integer('per_page', 10);

        $roles = $query->paginate($perPage);

        return $this->successResponse([
            'roles' => $roles->items(),

            'pagination' => [
                'current_page' => $roles->currentPage(),
                'last_page' => $roles->lastPage(),
                'per_page' => $roles->perPage(),
                'total' => $roles->total(),
            ],
        ], 'Roles fetched successfully');
    }
}
