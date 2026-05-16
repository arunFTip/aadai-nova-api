<?php

namespace App\Common\Authentication\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUserAction
{
    public function execute(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password.'],
            ]);
        }

        if ($user->status !== 'active') {
            throw ValidationException::withMessages([
                'email' => ['Your account is inactive. Please contact admin.'],
            ]);
        }

        $token = $user->createToken('aadai-nova-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
